<?php

namespace App\Controllers;

use App\Models\VantripperDB\Clients_Model as Clients;
use Exception;

class RegistrationController extends BaseController
{
    ## [POST , GET] signup 
    public function signup()
    {
        if ($this->request->getMethod() === 'POST')
            return $this->processRegistration();
        return view('Frontpage/Pages/registration', ['title' => ' Signup | Vantrippers Travel & Tours']);
    }

    ## processing registration - process clients data and return json format
    private function processRegistration()
    {
        Helper(['Form']);
        $clientCID = "CID_" . sprintf("%05d", mt_rand(0, 99999));
        $checkBox = $this->request->getPost('termsCheck');

        $data = [
            'cid' => $clientCID,
            'first_name' => ($this->request->getPost('firstName')) ? trim($this->request->getPost('firstName')) : '',
            'middle_name' => ($this->request->getPost('middleName')) ? trim($this->request->getPost('middleName')) : '',
            'last_name' => ($this->request->getPost('lastName')) ? trim($this->request->getPost('lastName')) : '',
            'address' => ($this->request->getPost('address')) ? trim($this->request->getPost('address')) : '',
            'gender' => ($this->request->getPost('gender')) ? trim($this->request->getPost('gender')) : '',
            'birth_date' => ($this->request->getPost('birth_date')) ? $this->request->getPost('birth_date') : '',
            'age' => ($this->request->getPost('age')) ? $this->request->getPost('age') : '',
            'mobile_number' => ($this->request->getPost('mobileNumber')) ? $this->request->getPost('mobileNumber') : '',
            'email' => ($this->request->getPost('email')) ? trim($this->request->getPost('email')) : '',
            'password' => ($this->request->getPost('email')) ? password_hash(trim($this->request->getPost('password')), PASSWORD_DEFAULT) : ''
        ];

        $Clients = new Clients();
        $validation = $this->validateClientData($Clients, $data);

        // check if terms and conditions is checked
        if(!$checkBox) {
            return $this->response->setJSON([
                'status' => 'info',
                'message' => 'please read and check, data privacy and terms and conditions'
            ]);
        }

        // validate clients data
        if($validation !== true) {
            return $this->response->setJSON([
                'status' => 'info',
                'message' => $validation
            ]);
        }

        // try and catch any possible errors and cancel registration
        try {
            if($Clients->InsertNewClient($data)) {
                return $this->response->setJSON([
                    'status' => 'success',
                ]);
            }
            else {
                return $this->response->setJSON([
                    "status"  => "error",
                    "message" => "There was an error during registration."
                ]);
            }
        }
        catch(Exception $e) {
            return $this->response->setJSON([
                'status' => 'erorr',
                'message' => $e->getMessage()
            ]);
        }
    }

    ## validate age and email
    private function validateClientData($clientModel, $data)
    {
        if (!is_numeric($data['age']) || (int)$data['age'] < 18) 
            return 'You must be at least 18 years old to register.';
        if ($clientModel->GetEmailByEmail($data['email'])) 
            return 'Email already registered. Please use a different email.';
        return true;
    }
}
