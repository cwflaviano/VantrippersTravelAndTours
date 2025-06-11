<?php

namespace App\Controllers;
use Exception;
use App\Models\VantripperDb\ServicesModel as services;
use App\Models\VantripperDb\TravelPackagesModel as travelPackages;
use App\Models\VantripperDb\ContactsModel as contacts;
class HomeController extends BaseController
{
    ## Render homepage/landing page
    public function home(){
        $services = new services();
        $travelPackages = new travelPackages();

        $data = [
            'services' => $services->getAllServices(),
            'packages' => $travelPackages->getAllTravelPackages(),
        ];
        return view('home/pages/home', $data);
    }

    ## Render about us page
    public function about() {
        return view('home/pages/about');
    }

    ## Render contact us page
    public function contact() {
        if($this->request->getMethod() === "POST") {
            $name = ($this->request->getPost('name')) ? trim($this->request->getPost('name')) : '';
            $email = ($this->request->getPost('email')) ? trim($this->request->getPost('email')) : '';
            $subject = ($this->request->getPost('subject')) ? trim($this->request->getPost('subject')) : '';
            $message = ($this->request->getPost('message')) ? trim($this->request->getPost('message')) : '';

            if(empty($name) || empty($email) || empty($message)) {
                return redirect()->back()->with('errorMessage', 'Please fill in all required fields (Name, Email, and Message).');
            }
            else {
                try {
                    $contacts = new contacts();
                    $contacts->db->query("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)", [$name, $email, $subject, $message]);
                    return redirect()->back()->with('successMessage', 'Thank you, '. $name . '!  Your message has been sent.');
                }
                catch(Exception $e) {
                    return redirect()->back()->with('errorMessage', 'Failed to send message: ' . $e->getMessage());
                }
            }
        }
        
        return view('home/pages/contact');
    }
}
