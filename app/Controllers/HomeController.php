<?php

namespace App\Controllers;
use Exception;
use App\Models\VantripperDB\Travel_Package_Model as travelPackages;
use App\Models\VantripperDB\Services_Model as services;
use App\Models\VantripperDB\Contact_Model as contacts;

class HomeController extends BaseController
{
    # redirect to homepage / landing page
    public function homepage()
    {
        $travelPackages = new travelPackages();
        $services = new services();

        $data = [
            'services' =>  $services->GetServices(),
            'packages' => $travelPackages->GetTravelPackages()
        ];
        return view('Frontpage/Pages/homepage', $data);
    }


    # redirection to about us page
    public function about() {
        $title = "About | Vantrippers Travel & Tours";
        return view('Frontpage/Pages/about', ['title' => $title]);
    }


    ## Send message from client in homepage form contacts
    public function SendMessage() {
        helper(['form', 'url']);

        if($this->request->getMethod() === 'POST') {
            $name = ($this->request->getPost('name')) ? trim($this->request->getPost('name')) : '';
            $email = ($this->request->getPost('email')) ? trim($this->request->getPost('email')) : '';  
            $subject =  ($this->request->getPost('subject')) ? trim($this->request->getPost('subject')) : '' ;
            $message =  ($this->request->getPost('message')) ? trim($this->request->getPost('message')) : '' ;

            if(empty($name) || empty($email) || empty($message))
                return redirect()->to('/#send_message')->with('errorMessage', 'Please fill in all required fields (Name, Email, and Message).');
            
            try {
                $contacts = new contacts();
                $data = [
                    'name'=> $name,
                    'email'=> $email,
                    'subject'=> $subject,
                    'message'=> $message
                ];
                $contacts->InsertContact($data);
                return redirect()->to('/#send_message')->with('successMessage', "Thank you, $name! Your message has been sent.");
            }
            catch(Exception $e) {
                return redirect()->to('/#send_message')->with('errorMessage', "Failed to send message: " . $e->getMessage());
            }
        }
        return redirect()->to('/#send_message')->with('errorMessage', '*Trying to send message failed. please use form below');
    }

    ## book van service from homepage
    public function BookVanService() {
        Helper(['form', 'uri']);
        $services = new services();

        // check if submitted using post method
        if($this->request->getMethod() == 'post') 
            return $this->ProcessBookingVanService();

        // else proceed here
        $encodedId = $this->request->getGet('id');
        $data = [];
        if($encodedId) {
            $decoded_payload = base64_decode(urldecode($_GET['id']));
            $parts = explode(':', $decoded_payload);
            if (count($parts) !== 2)
                die("Invalid parameter format.");
            
            $encrypted_value = intval($parts[0]);
            $offset = intval($parts[1]);
            $id = $encrypted_value - $offset;
            
            try {
                $service = $services->GetServicesByID($id);
                $data['service'] = $service;
            }catch(Exception $e) {
                die("Query failed: " . $e->getMessage());
            }
        }
        else {
            try {
                $service = $services->GetServicesOrderByIDWithLimmit();
                $data['service'] = $service;
            }catch(Exception $e) {
                die("Query failed: " . $e->getMessage());
            }
        }

        return view('Frontpage/Pages/van_bookings', $data);
    }

    ## processing van and tour bookings
    private function ProcessBookingVanService() {   
    }
}
