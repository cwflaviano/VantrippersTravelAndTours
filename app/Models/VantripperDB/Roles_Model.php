<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Roles_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = "roles";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'name',
        'level'
    ];

    
    ## Get all roles column rows
    public function GetRoles() {
        return $this->findALl();
    }
}