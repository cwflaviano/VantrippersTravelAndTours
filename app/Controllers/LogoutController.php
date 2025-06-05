<?php

namespace App\Controllers;

class LogoutController extends BaseController {

    ## Logout account / destroy sesion / etc
    public function logout() {
        $url = "/";

        // log out and redirect to time tracker login page if logged in time tracker
        if(session()->has('is_logged_in_time_tracker'))
            $url = "/timetracker/login";
        // log out and redirect to login page if logged in as admin
        if(session()->has('is_logged_in_admin'))
            $url = "/login";
        
        session()->destroy();
        return redirect()->to($url);
    }
}