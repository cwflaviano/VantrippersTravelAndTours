<?php

namespace App\Controllers;
use App\Models\VantripperDB\Users_Model as users;

class LoginController extends BaseController {
    
    public function signin() {
        helper(['form']);

        if($this->request->getMethod() === 'POST') 
            return $this->processLogin();

        return view('Frontpage/Pages/login', ['title' => 'Login | Vantrippers Travel & Tours']);
    }

    private function processLogin() {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if(empty($email) || empty($password)) 
            return redirect()->back()->with('error', 'Please fill in all fields.');

        $users = new users();
        $results = $users->GetUsersByEmail($email);
            
        if($results && password_verify($password, $results['password'])) {
            if($results['status'] == 1) {
                session()->set([
                    'user_id' => $results['id'],
                    'role_id' => $results['role_id'],
                    'department_id' => $results['department_id'],
                    'first_name' => $results['first_name'],
                    'last_name' => $results['last_name'],
                    'is_logged_in' => true,
                    'logged_in_time' => time()
                ]);
                return redirect()->back()->with('success', 'Login successful! Redirecting...');
            }
            else {
                return redirect()->back()->with('info', 'Your account is not activated. Please contact the administrator.');
            }
        }
        else {
           return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }
}