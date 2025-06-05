<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Session as session;

class Time_Tracker_Session implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {
        // URI: http://localhost/folder_name/segment1/segment2/segment3
        $first_seg = $request->getUri()->getSegment(1);
        $second_seg = $request->getUri()->getSegment(2);
        $third_seg = $request->getUri()->getSegment(3);
        // $session = new session();
        // $session_time_out = $session->expiration;

        if($first_seg === 'timetracker' && $second_seg === 'login') {
            if(session()->has('user_id')) {
                if(session()->get('role') === 'admin') 
                    return redirect()->to('/timetracker/admin/dashboard');
                elseif(session()->get('role' === 'ojt'))
                    return redirect()->to('/timetracker/ojt/dashboard');
            }
        }

        // check session in first-time-login page or in dashboard for ojt/interns and administrator
        if($second_seg === 'ojt' || $second_seg === 'admin') {
            if($third_seg === 'first-time-login') {
                if(!session()->has('user_id') && !session()->has('role')) 
                    return redirect()->to('/timetracker/login');
                if(!session()->has('must_change_password') || session()->get('must_change_password') != 1) 
                    return redirect()->to('/timetracker/ojt/dashboard');
            }
            if($third_seg === 'dashboard' || $third_seg === 'reports' || $third_seg === 'export' || $third_seg === 'import' || $third_seg === 'settings') {
                if(!session()->has('user_id') && session()->get('role') !== $arguments) 
                    return redirect()->to('/timetracker/login');
            }
        }
    }   

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
        // No changes after
    }
}
