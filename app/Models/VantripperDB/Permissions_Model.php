<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Permissions_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = "permissions";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name'];

    public function GetPermissions() {
        return $this->findAll();
    }
}