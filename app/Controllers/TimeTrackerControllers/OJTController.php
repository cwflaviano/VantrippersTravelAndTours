<?php

namespace App\Controllers\TimeTrackerControllers;
use App\Controllers\BaseController;
use App\Models\Vantripper_Time_TrackingDB\Users_Model as users;
use App\Models\Vantripper_Time_TrackingDB\Time_Logs_Model as time_logs;
use App\Models\Vantripper_Time_TrackingDB\Employees_Model as employees;

use DateTime;
use DateTimeZone;

class OJTController extends BaseController {

    public function dashboard() {
        date_default_timezone_set('Asia/Manila'); // Philippines timezone
        $users = new users();
        $employee = new employees();
        $time_logs = new time_logs();
        $response = null;

        if($this->request->getMethod() == 'POST' && $this->request->getPost('action')) {
            header('Content-Type: application/json');

            $employee_id = session()->get('employee_id');
            $date = date('Y-m-d');
            $time = date('H:i:s.u');
            $display_time = date('h:i A');

            if ($this->request->getPost('client_timestamp') !== null) {
                $clientTime = new DateTime($this->request->getPost('client_timestamp'));
                $clientTime->setTimezone(new DateTimeZone('Asia/Manila'));
                $time = $clientTime->format('H:i:s.u');
                $display_time = $clientTime->format('h:i A');
            }

            switch($this->request->getPost('action')) {
                case 'time_in':
                    $time_log = $time_logs->db->query("SELECT * FROM time_logs WHERE employee_id = ? AND log_date = ?", [$employee_id, $date])->getRowArray();
                    if($time_log) {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Already timed in today']);
                    }
                    else {
                        $time_logs->db->query("INSERT INTO time_logs (employee_id, log_date, time_in, status) VALUES (?, ?, ?, 'Active')", [$employee_id, $date, $time]);
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Timed in successfully at ' . $display_time]);
                    }
                    break; 

                case 'time_out':
                    $time_log = $time_logs->db->query("SELECT * FROM time_logs WHERE employee_id = ? AND log_date = ? AND time_in IS NOT NULL", [$employee_id, $date])->getRowArray();
                    if(!$time_log) {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'No time in record found for today']);
                    }
                    else if($time_log['time_out']){
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Already timed out today']);
                    }
                    else {
                        $time_in = new DateTime($time_log['time_in']);
                        $time_out = new DateTime($time);
                        $interval = $time_in->diff($time_out);
                        $total_hours = $interval->h + ($interval->i / 60);
                        if($time_log['break_start'] && $time_log['break_end']) {
                            $break_start = new DateTime($time_log['break_start']);
                            $break_end = new DateTime($time_log['break_end']);
                            $break_interval = $break_start->diff($break_end);
                            $break_hours = $break_interval->h + ($break_interval->i / 60);
                            $total_hours -= $break_hours;
                        }
                        $time_logs->db->query("UPDATE time_logs SET time_out = ?, total_hours = ?, status = 'Completed' WHERE employee_id = ? AND log_date = ?", [$time, $total_hours, $employee_id, $date]);
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Timed out successfully at ' . $display_time]);
                    }
                    break; 

                case 'break_start':
                    $time_log = $time_logs->db->query("SELECT * FROM time_logs WHERE employee_id = ? AND log_date = ? AND time_in IS NOT NULL AND time_out IS NULL", [$employee_id, $date])->getRowArray();                       
                    if (!$time_log) {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Please time in first']);
                    } else if ($time_log['break_start'] && !$time_log['break_end']) {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Already on break']);
                    } else {
                        $time_logs->db->query("UPDATE time_logs SET break_start = ?, status = 'On Break' WHERE employee_id = ? AND log_date = ?", [$time, $employee_id, $date]);
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Break started at ' . $display_time]);
                    }
                    break; 

                case 'break_end':
                    $time_log = $time_logs->db->query("SELECT * FROM time_logs WHERE employee_id = ? AND log_date = ? AND break_start IS NOT NULL AND break_end IS NULL", [$employee_id, $date])->getRowArray();
                    if ($time_log === null) {
                        echo json_encode(['status' => 'success', 'message' => 'Break started at ' . $display_time]);
                    } else {
                        $time_logs->db->query("UPDATE time_logs SET break_end = ?, status = 'Active' WHERE employee_id = ? AND log_date = ?", [$time, $employee_id, $date]);
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Break ended at ' . $display_time]);
                    }
                    break; 
            }
        }

        $employee = $employee->db->query("SELECT * FROM employees WHERE employee_id = ?", [session()->get('employee_id')])->getRowArray();
        $todayLog = $time_logs->db->query("SELECT * FROM time_logs WHERE employee_id = ? AND log_date = CURDATE()", [session()->get('employee_id')])->getRowArray();
        $weeklyLogs = $time_logs->db->query("SELECT log_date, time_in, time_out, break_start, break_end, total_hours, status FROM time_logs WHERE employee_id = ? AND log_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) ORDER BY log_date DESC", [session()->get('employee_id')])->getResultArray();
        $monthlyLogs = $time_logs->db->query("SELECT log_date, time_in, time_out, break_start, break_end, total_hours, status FROM time_logs  WHERE employee_id = ? AND log_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) ORDER BY log_date DESC", [session()->get('employee_id')])->getResultArray();

        $weeklyHours = array_sum(array_column($weeklyLogs, 'total_hours'));
        $monthlyHours = array_sum(array_column($monthlyLogs, 'total_hours'));
        $daysWorkedThisWeek = count(array_filter($weeklyLogs, function($log) { return $log['time_in']; }));
        $daysWorkedThisMonth = count(array_filter($monthlyLogs, function($log) { return $log['time_in']; }));

        $data = [
            'title' => 'OJT Dashboard - Time Tracker',
            'employee' => $employee,
            'todayLog' => $todayLog,
            'weeklyLogs' => $weeklyLogs,
            'monthlyLogs' => $monthlyLogs,
            'weeklyHours' => $weeklyHours,
            'monthlyHours' => $monthlyHours,
            'daysWorkedThisWeek' => $daysWorkedThisWeek,
            'daysWorkedThisMonth' => $daysWorkedThisMonth,
            'response' => $response
        ];
        return view('TimeTracker/OJT/dashboard', $data);
    }
}