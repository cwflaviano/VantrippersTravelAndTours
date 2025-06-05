<?php

namespace App\Controllers\AdminControllers;
use App\Controllers\BaseController;

class DashboardController extends BaseController {
  
    ## Redirect to Admin Dashboard
    public function dashboard() {
        return view("Adminpage/Pages/Dashboard/dashboard");
    }
}