<?php

namespace App\Controllers\TimeTrackerControllers;
use App\Controllers\BaseController;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use App\Models\Vantripper_Time_TrackingDB\Employees_Model as employees;
use App\Models\Vantripper_Time_TrackingDB\Time_Logs_Model as time_logs;

class ExportController extends BaseController {

    public function export() {
        $startDate = session()->get('start_date') ? session()->get('start_date') : date('Y-m-d', strtotime('-30 days'));
        $endDate = session()->get('end_date') ? session()->get('end_date') : date('Y-m-d');
        $employeeId = session()->get('employee_id') ? session()->get('employee_id') : '';
        $employeeType = session()->get('employee_type') ? session()->get('employee_type') : '';
        $departmentId = session()->get('department_id') ? session()->get('department_id') : '';
        $format = $this->request->getGet('format') ? $this->request->getGet('format') : 'csv';

        $validFormats = ['csv', 'excel', 'pdf'];
        if (!in_array($format, $validFormats)) {
            $format = 'csv';
        }

        $employee = new employees();
        $time_log = new time_logs();

        $sql = "SELECT t.*, e.name, e.type, d.name AS department_name FROM time_logs t JOIN employees e ON t.employee_id = e.employee_id LEFT JOIN departments d ON e.department_id = d.id WHERE t.log_date BETWEEN ? AND ?";
        $params = [$startDate, $endDate];
        $types = "ss";

        if (!empty($employeeId)) {
            $sql .= " AND t.employee_id = ?";
            $params[] = $employeeId;
            $types .= "s";
        }
        if (!empty($employeeType)) {
            $sql .= " AND e.type = ?";
            $params[] = $employeeType;
            $types .= "s";
        }
        if (!empty($departmentId)) {
            $sql .= " AND e.department_id = ?";
            $params[] = $departmentId;
            $types .= "s";
        }
        $sql .= " ORDER BY t.log_date DESC, e.name";
        $timeLogs = $time_log->db->query($sql, $params)->getResultArray();

        $filename = 'time_records_' . date('Y-m-d') . '.' . ($format === 'excel' ? 'xlsx' : $format);

        switch ($format) {
            case 'csv':
                $this->exportCSV($timeLogs, $filename);
                break;
            case 'excel':
                $this->exportExcel($timeLogs, $filename);
                break;
            case 'pdf':
                $this->exportPDF($timeLogs, $filename);
                break;
        }

        $employees = $employee->db->query("SELECT employee_id, name FROM employees ORDER BY name")->getResultArray();

        $data = [
            'title' => 'Admin Dashboard - Time Tracker',
            'startDate' => $startDate,
            'endDate' => $endDate,
            'employeeId' => $employeeId,
            'employeeType' => $employeeType,
            'departmentId' => $departmentId,
            'format' => $format,
            'timeLogs' => $timeLogs,
            'employees' => $employees
        ];
        return view('TimeTracker/Admin/export', $data);
    }


    private function  format_hours_minutes($decimal_hours) {
        $hours = floor($decimal_hours);
        $minutes = round(($decimal_hours - $hours) * 60);
        return sprintf("%d hrs %02d mins", $hours, $minutes);
    }

    private function exportCSV($data, $filename) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $output = fopen('php://output', 'w');
        fputcsv($output, ['Employee ID', 'Name', 'Type', 'Department', 'Date', 'Time In', 'Time Out', 'Break Start', 'Break End', 'Total Hours', 'Status']);
        
        foreach ($data as $row) {
            fputcsv($output, [
                $row['employee_id'],
                $row['name'],
                $row['type'],
                isset($row['department_name']) ? $row['department_name'] : '-',
                $row['log_date'],
                $row['time_in'],
                $row['time_out'],
                $row['break_start'],
                $row['break_end'],
                $this->format_hours_minutes($row['total_hours']),
                $row['status'],
            ]);
        }
        
        fclose($output);
        exit;
    }

     
    private function exportExcel($data, $filename) {
        if (!class_exists('PhpOffice\PhpSpreadsheet\Spreadsheet')) {
            $this->exportCSV($data, str_replace('.xlsx', '.csv', $filename));
            exit;
        }
        
        require ROOTPATH . 'vendor/autoload.php';
        
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $headers = ['Employee ID', 'Name', 'Type', 'Department', 'Date', 'Time In', 'Time Out', 'Break Start', 'Break End', 'Total Hours', 'Status'];
        $column = 1;
        foreach ($headers as $header) {
            $columnLetter = Coordinate::stringFromColumnIndex($index + 1);
            $sheet->setCellValue($columnLetter . '1', $header);
        }
        
        $row = 2;
        foreach ($data as $item) {
            $column = 1;
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($column++), $row, $item['employee_id']);
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($column++), $row, $item['name']);
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($column++), $row, $item['type']);
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($column++), $row, $item['log_date']);
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($column++), $row, $item['time_in']);
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($column++), $row, $item['time_out']);
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($column++), $row, $item['break_start']);
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($column++), $row, $item['break_end']);
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($column++), $row, $item['total_hours']);
            $sheet->setCellValue(Coordinate::stringFromColumnIndex($column++), $row, $item['status']);
            $row++;
        }
        
        foreach (range(1, count($headers)) as $col) {
            $sheet->getColumnDimensionByColumn($col)->setAutoSize(true);
        }
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    
    private function exportPDF($data, $filename) {
        if (!class_exists('TCPDF')) {
                $this->exportCSV($data, str_replace('.pdf', '.csv', $filename));
                exit;
            }
            
            require_once(ROOTPATH . 'vendor/tecnickcom/tcpdf/tcpdf.php');
            
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);            
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Time Tracker');
            $pdf->SetTitle('Time Records Report');
            $pdf->SetSubject('Time Records');
            
            $pdf->SetHeaderData('', 0, 'Time Tracker - Time Records Report', 'Generated on ' . date('Y-m-d H:i:s'));
            
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            
            $pdf->AddPage();
            
            $html = '<table border="1" cellpadding="5">
                <thead>
                    <tr style="background-color: #f8f9fa; font-weight: bold;">
                        <th>Employee</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Break</th>
                        <th>Hours</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>';
            
            foreach ($data as $row) {
                $breakTime = '';
                if ($row['break_start'] && $row['break_end']) {
                    $breakTime = date('h:i A', strtotime($row['break_start'])) . ' - ' . 
                                date('h:i A', strtotime($row['break_end']));
                }
                
                $html .= '<tr>
                    <td>' . $row['name'] . '<br><small>' . $row['employee_id'] . ' (' . $row['type'] . ')</small></td>
                    <td>' . date('M d, Y', strtotime($row['log_date'])) . '</td>
                    <td>' . ($row['time_in'] ? date('h:i A', strtotime($row['time_in'])) : '-') . '</td>
                    <td>' . ($row['time_out'] ? date('h:i A', strtotime($row['time_out'])) : '-') . '</td>
                    <td>' . $breakTime . '</td>
                    <td>' . number_format($row['total_hours'], 2) . ' hrs</td>
                    <td>' . $row['status'] . '</td>
                </tr>';
            }
            
            $html .= '</tbody></table>';
            
            $pdf->writeHTML($html, true, false, true, false, '');
            
            $pdf->Output($filename, 'D');
            exit;
    }
}