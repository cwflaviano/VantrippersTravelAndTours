<?php

namespace App\Controllers\TimeTrackerControllers;
use App\Controllers\BaseController;
use App\Models\Vantripper_Time_TrackingDB\Users_Model as users;
use App\Models\Vantripper_Time_TrackingDB\Departments_Model as departments;
use App\Models\Vantripper_Time_TrackingDB\Employees_Model as employees;
use App\Models\Vantripper_Time_TrackingDB\Time_Logs_Model as time_logs;
use DateTime;

class ReportsController extends BaseController {

    public function reports() {
        // $users = new users();
        // $departments = new departments();
        // $time_log = new time_logs();
        $employee = new employees();

        $startDate = $this->request->getGet('start_date') ? $this->request->getGet('start_date') : date('Y-m-d', strtotime('-30 days'));
        $endDate = $this->request->getGet('end_date') ? $this->request->getGet('end_date') : date('Y-m-d');
        $employeeId = $this->request->getGet('employee_id') ? $this->request->getGet('employee_id') : '';
        $employeeType = $this->request->getGet('employee_type') ? $this->request->getGet('employee_type') : ''; 

        $employees = $employee->db->query("SELECT employee_id, name, type FROM employees ORDER BY name")->getResultArray();

        $sql = "SELECT t.*, e.name, e.type, COALESCE(t.extra_hours, 0) as extra_hours, COALESCE(t.double_hours, 0) as double_hours, (COALESCE(t.total_hours, 0) + COALESCE(t.extra_hours, 0) + (COALESCE(t.double_hours, 0) * 2)) as calculated_total_hours FROM time_logs t  JOIN employees e ON t.employee_id = e.employee_id  WHERE t.log_date BETWEEN ? AND ?";
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
        $sql .= " ORDER BY t.log_date DESC, e.name";
        $timeLogs = $employee->db->query($sql, $params)->getResultArray();

        $totalRegularHours = 0;
        $totalExtraHours = 0;
        $totalDoubleHours = 0;
        $totalCalculatedHours = 0;
        $totalDays = 0;
        $employeeStats = [];
        $dailyStats = [];

        foreach ($timeLogs as $log) {
            $regularHours = $log['total_hours'] ?? 0;
            $extraHours = $log['extra_hours'] ?? 0;
            $doubleHours = $log['double_hours'] ?? 0;
            $calculatedTotal = $log['calculated_total_hours'] ?? 0;
            
            $totalRegularHours += $regularHours;
            $totalExtraHours += $extraHours;
            $totalDoubleHours += $doubleHours;
            $totalCalculatedHours += $calculatedTotal;
            
            $date = $log['log_date'];
            if (!isset($dailyStats[$date])) {
                $dailyStats[$date] = [
                    'date' => $date,
                    'regular_hours' => 0,
                    'extra_hours' => 0,
                    'double_hours' => 0,
                    'total_calculated_hours' => 0,
                    'employee_count' => 0
                ];
                $totalDays++;
            }
            
            $dailyStats[$date]['regular_hours'] += $regularHours;
            $dailyStats[$date]['extra_hours'] += $extraHours;
            $dailyStats[$date]['double_hours'] += $doubleHours;
            $dailyStats[$date]['total_calculated_hours'] += $calculatedTotal;
            $dailyStats[$date]['employee_count']++;
            
            if (!isset($employeeStats[$log['employee_id']])) {
                $employeeStats[$log['employee_id']] = [
                    'employee_id' => $log['employee_id'],
                    'name' => $log['name'],
                    'type' => $log['type'],
                    'days_worked' => 0,
                    'regular_hours' => 0,
                    'extra_hours' => 0,
                    'double_hours' => 0,
                    'total_calculated_hours' => 0,
                    'avg_hours_per_day' => 0
                ];
            }
            
            $employeeStats[$log['employee_id']]['days_worked']++;
            $employeeStats[$log['employee_id']]['regular_hours'] += $regularHours;
            $employeeStats[$log['employee_id']]['extra_hours'] += $extraHours;
            $employeeStats[$log['employee_id']]['double_hours'] += $doubleHours;
            $employeeStats[$log['employee_id']]['total_calculated_hours'] += $calculatedTotal;
        }

        foreach ($employeeStats as &$stat) {
            $stat['avg_hours_per_day'] = $stat['days_worked'] > 0 ? 
                $stat['total_calculated_hours'] / $stat['days_worked'] : 0;
        }

        ksort($dailyStats);
        // Prepare chart data
        $chartLabels = [];
        $chartRegularData = [];
        $chartExtraData = [];
        $chartDoubleData = [];
        foreach ($dailyStats as $date => $stats) {
            $chartLabels[] = date('M d', strtotime($date));
            $chartRegularData[] = $stats['regular_hours'];
            $chartExtraData[] = $stats['extra_hours'];
            $chartDoubleData[] = $stats['double_hours'] * 2; // Show as calculated hours
        }

        $data = [
            'title' => 'Reports - Time Tracker',
            'startDate' => $startDate,
            'endDate' => $endDate,
            'employeeId' => $employeeId,
            'employeeType' => $employeeType,
            'employees' => $employees,
            'timeLogs' => $timeLogs,
            'totalRegularHours' => $totalRegularHours,
            'totalExtraHours' => $totalExtraHours,
            'totalDoubleHours' => $totalDoubleHours,
            'totalCalculatedHours' => $totalCalculatedHours,
            'totalDays' => $totalDays,
            'employeeStats' => $employeeStats,
            'dailyStats' => $dailyStats,
            'chartLabels' => $chartLabels,
            'chartRegularData' => $chartRegularData,
            'chartExtraData' => $chartExtraData,
            'chartDoubleData' => $chartDoubleData
        ];
        return view('TimeTracker/Admin/reports', $data);
    }
}