<?php

namespace App\Controllers\TimeTrackerControllers;
use Exception;
use App\Controllers\BaseController;
use App\Models\Vantripper_Time_TrackingDB\Users_Model as users;

class LoginController extends BaseController {

    public function login() {
        if($this->request->getMethod() == 'POST') 
            return $this->process_login();
        return view('TimeTracker/time_tracker_login', ['title' => 'Time Tracker - Login']);
    }

    // process login if its post method
    private function process_login() {
        $username = trim($this->request->getPost('username'));
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            return redirect()->back()->with('error', 'Please fill in all fields');
        } else {
            $users = new users();
            $user = $users->GetUserByUsername($username);
            $adminCheck = $users->GetAdmiAccount();
            // create default admin if admin not found
            if(!$adminCheck) {
                $users->InsertDefaultAdminAccount();
            }

            // continue to login
            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'name' => $user['name'],
                    'employee_id' => $user['employee_id'],
                    'is_logged_in_time_tracker' => true,
                    'logged_in_time' => time()
                ]);

                $checkField = $users->db->query("SHOW COLUMNS FROM users LIKE 'must_change_password'")->getResult();
                
                if (count($checkField) > 0) {
                    session()->set('must_change_password', ($user['must_change_password']) ? (int)$user['must_change_password'] : 0);
                } else {
                    try {
                        $user->db->query("ALTER TABLE users ADD COLUMN must_change_password TINYINT(1) DEFAULT 0")->getResult();
                        session()->set('must_change_password', 0);
                    } catch (Exception $e) {
                        session()->set('must_change_password', 0);
                    }
                }

                if ($user['role'] == 'admin') {
                    return redirect()->to('/timetracker/admin/dashboard');
                } elseif ($user['role'] == 'ojt' && session()->get('must_change_password') == 1) {
                    return redirect()->to('/timetracker/ojt/first-time-login');
                } else {
                    return redirect()->to('/timetracker/ojt/dashboard');
                }
                exit;
            }
            else {
                return redirect()->back()->with('error', 'Invalid username or password');
            }
        }
    }
}