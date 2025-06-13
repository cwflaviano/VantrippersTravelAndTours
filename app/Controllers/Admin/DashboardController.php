<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function dashboard(){

        $data = [
            'title' => 'Dashboard | Administrator'
        ];
        return view('admin/pages/dashboard/dashboard', $data);
    }
}
