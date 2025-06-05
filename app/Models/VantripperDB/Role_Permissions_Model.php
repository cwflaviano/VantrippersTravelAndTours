<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Role_Permissions extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = "role_permissions";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name'];

    public function GetRolePermissions() {
        return $this->findAll();
    }
}