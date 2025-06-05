<?php

namespace App\Controllers\TimeTrackerControllers;

use App\Controllers\BaseController;
use App\Models\Vantripper_Time_TrackingDB\Users_Model as users;
use App\Models\Vantripper_Time_TrackingDB\Departments_Model as departments;
use App\Models\Vantripper_Time_TrackingDB\Employees_Model as employees;
use App\Models\Vantripper_Time_TrackingDB\Time_Logs_Model as time_logs;
use DateTime;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPUnit\Framework\Constraint\Count;

require_once ROOTPATH . "vendor/autoload.php";


class AdminController extends BaseController {

    public function dashboard() {
        // create an instance of these models
        $dept = new departments();
        $employees = new employees();
        $users = new users();
        $time_logs = new time_logs();
        // get all departments order by name
        $departments = $dept->db->query("SELECT * FROM departments ORDER BY name")->getResultArray();

        // post methods
        if($this->request->getMethod() == "POST" && $this->request->getPost('action')) {
            header('Content-Type: application/json');

            switch($this->request->getPost('action')) {
                // auto generate employee id if field is populated
                case "generate_employee_id":
                    $type = $this->request->getPost('type');
                    $department_id = $this->request->getPost('department_id');
                    $type_code = ($type === 'Staff') ? 'STF' : (($type === 'OJT') ? 'OJT' : 'EMP');
                    $departments = $dept->db->query("SELECT name FROM departments WHERE id = ?", [$department_id])->getRow();
                    $dept_code = $department_id;
                    if ($departments && !empty($departments->name)) {
                        $dept_code = strtoupper(substr(preg_replace('/[^A-Za-z0-9]/', '', $departments->name), 0, 3));
                    }
                    $last_id = $dept->db->query("SELECT employee_id FROM employees WHERE type = ? AND department_id = ? ORDER BY employee_id DESC LIMIT 1", [$type, $department_id])->getRow();
                    $next_number = '001';
                    if ($last_id) {
                        if (preg_match('/(\d{3})$/', $last_id->employee_id, $matches)) {
                            $next_number = str_pad(((int)$matches[1]) + 1, 3, '0', STR_PAD_LEFT);
                        }
                    }
                    $new_id = $type_code . '-' . $dept_code . '-' . $next_number;
                    return $this->response->setJSON(['employee_id' => $new_id]);

                // insert new imployee
                case "add_employee":
                    $employee_id = $this->request->getPost('employee_id');     
                    $name = $this->request->getPost('name');
                    $type = $this->request->getPost('type');
                    $department_id = $this->request->getPost('department_id') ? $this->request->getPost('department_id') : null;
                    $email = $this->request->getPost('email') ? trim($this->request->getPost('email')) : '';

                    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'A valid email address is required to create an employee account.']);
                        break;
                    }

                    $db = \Config\Database::connect('vantripper_time_tracking');
                    try {
                        $db->transBegin();
                        $employees->db->query("INSERT INTO employees (employee_id, name, type, department_id) VALUES (?, ?, ?, ?)", [$employee_id, $name, $type, $department_id]);                      
                        $temp_password = bin2hex(random_bytes(4));
                        $hashed_password = password_hash($temp_password, PASSWORD_DEFAULT);
                        $role = strtolower($type);
                        $users->db->query("INSERT INTO users (username, password, role, employee_id, name, email, created_at, must_change_password) VALUES (?, ?, ?, ?, ?, ?, NOW(), 1)", [$employee_id, $hashed_password, $role, $employee_id, $name, $email]);

                        $emailSent = $this->sendAccountEmail($email, $name, $employee_id, $temp_password);
                        if (!$emailSent) {
                            $db->transRollback();
                            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to send account credentials email. Employee not added.']);
                            break;
                        }
                        $db->transCommit();
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Employee and user account created. Credentials sent to email.']);
                    }
                    catch(Exception $e) {
                        if($db->transStatus()) 
                            $db->transRollback();
                        if(strpos($e->getMessage(), 'Duplicate') !== false)
                            $msg = 'Employee ID already exists.';
                        else 
                            $msg = 'Database error: ' . $e->getMessage();

                        return $this->response->setJSON(['status' => 'error', 'message' => $msg]);
                    }
                    break;

                // delete an employee by id
                case "delete_employee":
                    $employee_id = $this->request->getPost('employee_id');
                    try {
                        $employees->db->query("DELETE FROM employees WHERE employee_id = ?", [$employee_id]);
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Employee deleted successfully']);
                    } catch (Exception $e) {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Cannot delete employee with existing time logs']);
                    }
                    break;
                case 'time_in':
                case 'time_out':
                case 'break_start':
                // end break
                case 'break_end':
                    $employee_id = $this->request->getPost('employee_id');
                    $date = date('Y-m-d');  
                    $time = date('H:i:s');

                    if ($this->request->getPost('action') == 'time_in') {
                        $timeLogs = $time_logs->db->query("SELECT * FROM time_logs WHERE employee_id = ? AND log_date = ?", [$employee_id, $date])->getRowArray();

                        if ($timeLogs) {
                            return $this->response->setJSON(['status' => 'error', 'message' => 'Already timed in today']);
                        } else {
                            $time_logs->db->query("INSERT INTO time_logs (employee_id, log_date, time_in, status) VALUES (?, ?, ?, 'Active')", [$employee_id, $date, $time]);
                            return $this->response->setJSON(['status' => 'success', 'message' => 'Timed in successfully at ' . date('h:i A')]);
                        }
                    }
                    elseif ($this->request->getPost('action') == 'time_out') {
                        $timeLogs = $time_logs->db->query("SELECT * FROM time_logs WHERE employee_id = ? AND log_date = ? AND time_in IS NOT NULL", [$employee_id, $date])->getRowArray();

                        if (!$timeLogs) {
                            return $this->response->setJSON(['status' => 'error', 'message' => 'No time in record found for today']);
                        } else if ($timeLogs['time_out']) {
                            return $this->response->setJSON(['status' => 'error', 'message' => 'Already timed out today']);
                        } else {
                            $time_in = new DateTime($timeLogs['time_in']);
                            $time_out = new DateTime($time);
                            $interval = $time_in->diff($time_out);
                            $total_hours = $interval->h + ($interval->i / 60);

                            if ($timeLogs['break_start'] && $timeLogs['break_end']) {
                                $break_start = new DateTime($timeLogs['break_start']);
                                $break_end = new DateTime($timeLogs['break_end']);
                                $break_interval = $break_start->diff($break_end);
                                $break_hours = $break_interval->h + ($break_interval->i / 60);
                                $total_hours -= $break_hours;
                            }
                            $time_logs->db->query("UPDATE time_logs SET time_out = ?, total_hours = ?, status = 'Completed' WHERE employee_id = ? AND log_date = ?", [$time, $total_hours, $employee_id, $date]);
                            return $this->response->setJSON(['status' => 'success', 'message' => 'Timed out successfully at ' . date('h:i A')]);
                        }
                    }
                    elseif ($this->request->getPost('action') == 'break_start') {
                        $timeLogs = $time_logs->db->query("SELECT * FROM time_logs WHERE employee_id = ? AND log_date = ? AND time_in IS NOT NULL AND time_out IS NULL", [$employee_id, $date])->getRowArray();

                        if (!$timeLogs) {
                            return $this->response->setJSON(['status' => 'error', 'message' => 'Please time in first']);
                        } else if ($timeLogs['break_start'] && !$timeLogs['break_end']) {
                            return $this->response->setJSON(['status' => 'error', 'message' => 'Already on break']);
                        } else {
                            $time_logs->db->query("UPDATE time_logs SET break_start = ?, status = 'On Break' WHERE employee_id = ? AND log_date = ?", [$time, $employee_id, $date]);
                            return $this->response->setJSON(['status' => 'success', 'message' => 'Break started at ' . date('h:i A')]);
                        }
                    } elseif ($this->request->getPost('action') == 'break_end') {
                        $timeLogs = $time_logs->db->query("SELECT * FROM time_logs WHERE employee_id = ? AND log_date = ? AND break_start IS NOT NULL AND break_end IS NULL", [$employee_id, $date])->getRowArray();

                        if (!$timeLogs) {
                            return $this->response->setJSON(['status' => 'error', 'message' => 'No active break found']);
                        } else {
                            $time_logs->db->query("UPDATE time_logs SET break_end = ?, status = 'Active' WHERE employee_id = ? AND log_date = ?", [$time, $employee_id, $date]);
                            return $this->response->setJSON(['status' => 'success', 'message' => 'Break ended at ' . date('h:i A')]);
                        }
                    }
                    break;
            }
        }
      
        // pagination
        $perPage = 10;
        $page = $this->request->getGet('page') ? max(1, intval($this->request->getGet('page'))) : 1;
        $offset = ($page - 1) * $perPage;
        $filter_dept = $this->request->getGet('filter_dept') ? $this->request->getGet('filter_dept') : '';

        // filters
        $where = '';
        $params = [];
        if ($filter_dept !== '' && $filter_dept !== 'all') {
            $where = 'WHERE e.department_id = ?';
            $params[] = $filter_dept;
        }

        $totalEmployees = $employees->db->query("SELECT COUNT(*) FROM employees e $where", [$params])->getResultArray();
        $totalPages = ceil(Count($totalEmployees) / $perPage);
        $employee = $employees->db->query("SELECT e.*, d.name AS department_name FROM employees e LEFT JOIN departments d ON e.department_id = d.id $where ORDER BY d.name, e.type, e.name LIMIT $perPage OFFSET $offset", [$params])->getResultArray();
        $todaySummary = $employees->db->query("SELECT e.employee_id, e.name, e.type, t.time_in, t.time_out, t.status, t.break_start, t.break_end, t.total_hours FROM employees e LEFT JOIN time_logs t ON e.employee_id = t.employee_id AND t.log_date = CURDATE() ORDER BY e.type, e.name")->getResultArray();
        $weeklySummary = $employees->db->query("SELECT e.employee_id, e.name, e.type, COUNT(t.id) as days_worked, SUM(t.total_hours) as total_hours FROM employees e LEFT JOIN time_logs t ON e.employee_id = t.employee_id AND t.log_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) GROUP BY e.employee_id, e.name, e.type ORDER BY e.type, e.name")->getResultArray();
        
        date_default_timezone_set('Asia/Manila');
        // time sheet tab
        $timesheet = $employees->db->query("SELECT e.employee_id, e.name, e.type, t.log_date, t.time_in, t.time_out, t.break_start, t.break_end, t.total_hours, t.status FROM employees e LEFT JOIN time_logs t ON e.employee_id = t.employee_id WHERE t.log_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) ORDER BY t.log_date DESC, e.name")->getResultArray();

        // to be used in views
        $data = [
            'title' => 'Admin Dashboard - Time Tracker',
            'departments' => $departments,
            'page' => $page,
            'filter_dept' => $filter_dept,
            'timesheet' => $timesheet,
            'weeklySummary' => $weeklySummary,
            'todaySummary' => $todaySummary,
            'employees' => $employee,
            'totalPages' => $totalPages,
            'totalEmployees' => $totalEmployees
        ];
        return view('TimeTracker/Admin/dashboard', $data);
    }


    // send email 
    private function sendAccountEmail($to, $toName, $username, $tempPassword) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'vantripperstravelandtoursmain@gmail.com'; 
            $mail->Password = 'appk gdrw lsad urko';  
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('vantripperstravelandtoursmain@gmail.com', 'Time Tracker');
            $mail->addAddress($to, $toName);

            $mail->isHTML(true);
            $mail->Subject = 'Your Time Tracker Account Credentials';
            $mail->Body = "Hello $toName,<br><br>Your Time Tracker account has been created.<br><br><b>Login:</b><br><b>Username:</b> $username<br><b>Temporary Password:</b> $tempPassword<br><br>Please log in and set your own username and password.<br><br>Thank you.";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}