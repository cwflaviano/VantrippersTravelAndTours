<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VantripperDb\UsersModel as users;

class LoginController extends BaseController
{
    ## Login Authentication
    public function login()   {
        
        if($this->request->getMethod() === 'POST') {
            $email = trim($this->request->getPost('email'));
            $password = trim($this->request->getPost('password'));

            if(empty($email) || empty($password)) {
                return redirect()->back()->with('error','Please fill in all fields.');
            }
            else {
                $users = new users();
                $userInserted = $users->db->query("SELECT id, first_name, last_name, password, role_id, department_id, status FROM users WHERE email = ?", [$email])->getRowArray();
                if($userInserted && password_verify($password, $userInserted['password'])) {
                    if($userInserted['status'] == 1) {
                        session()->set([
                            'user_id' => $userInserted['id'],
                            'role_id' => $userInserted['role_id'],
                            'department_id' => $userInserted['department_id'],
                            'first_name' => $userInserted['first_name'],
                            'last_name' => $userInserted['last_name']
                        ]);
                        return redirect()->back()->with('success','Login successful! Redirecting...');
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
        return view('home/pages/login', ['title' => 'Vantrippers - Account login']);
    }
}
