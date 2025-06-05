<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Contact_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = 'contacts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'name',
        'email',
        'subject',
        'message',
        'created_at'
    ];
    protected $useTimestamps = true;
    protected $updatedField = '';
    
    ## Get All columns array results
    public function GetContacts() {
        return $this->findAll();
    }

    ## Insert contact messages by clients
    public function InsertContact($data) {
        return $this->insert($data);
    }
}