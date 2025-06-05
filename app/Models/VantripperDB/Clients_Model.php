<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Clients_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = 'clients'; 
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'cid', 
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'gender',
        'birth_date',
        'age',
        'mobile_number',
        'email',
        'password',
        'created_at'
    ];
    protected $useTimestamps = true;
    protected $updatedField = ''; // ignore updated field

    
    ## Get clients email by id
    public function GetEmailByEmail($email) {
        return $this->where('email', $email)->first();
    }

    ## Get clients full name
    public function GetClientsFullName() {
        return $this->db->query("SELECT first_name, middle_name, last_name FROM clients")->getResult();
    }

    public function InsertNewClient($data) {
        return $this->insert($data);
    }
}