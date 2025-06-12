<?php

namespace App\Controllers;
use Exception;

class ErrorController extends BaseController
{
    public function error_404() {
        return view('errors/custom_error_pages/404_error');
    }

    public function redirect_back() {
        if(session()->has('administrator_account') && session()->has('user_id') && session()->get('role_id') == 1) {
            return redirect()->to('/admin/dashboard');
        }
        else {
            return redirect()->to('/');
        }
    }
}