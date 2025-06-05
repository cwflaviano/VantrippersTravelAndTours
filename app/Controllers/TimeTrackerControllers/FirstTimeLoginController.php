<?php

namespace App\Controllers\TimeTrackerControllers;
use Exception;
use App\Controllers\BaseController;
use App\Models\Vantripper_Time_TrackingDB\Users_Model as users;

class FirstTimeLoginController extends BaseController {

    public function first_time_login() {
        if($this->request->getMethod() == 'POST') 
            return $this->process_login();
        return view('TimeTracker/OJT/first_time_login', ['title' => 'First Login - Set Username & Password']);
    }

    private function process_login() {
        $userId = session()->get('user_id');
        $newUsername = trim($this->request->getPost('username'));
        $newPassword = $this->request->getPost('password'); 
        $confirmPassword = $this->request->getPost('confirm_password');

        if(empty($newUsername) || empty($newPassword) || empty($confirmPassword))
            return redirect()->back()->with('message', 'All fields are required.');
        elseif($newPassword !== $confirmPassword)
            return redirect()->back()->with('message', 'Passwords do not match.');
        else {
            $users = new users();
            $user = $users->db->query("SELECT id FROM users WHERE username = ? AND id != ?", [$newUsername, $userId])->getResult();

            if($user) {
                return redirect()->back()->with('message', 'Username is already taken.');
            }
            else {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $checkField = $users->db->query("SHOW COLUMNS FROM users LIKE 'must_change_password'")->getResult();
            
                if ($checkField > 0)
                    $users->db->query("UPDATE users SET username = ?, password = ?, must_change_password = 0 WHERE id = ?", [$newUsername, $hashedPassword, $userId]);
                else {
                    $users->db->query("UPDATE users SET username = ?, password = ? WHERE id = ?", [$newUsername, $hashedPassword, $userId]);

                    try {
                        $users->db->query("ALTER TABLE users ADD COLUMN must_change_password TINYINT(1) DEFAULT 0");
                    }
                    catch(Exception $e) {}
                }
                session()->set(['must_change_password' => 0, 'username' => $newUsername]);
                return redirect()->to('/timetracker/ojt/dashboard');
            }
        }
    }
}