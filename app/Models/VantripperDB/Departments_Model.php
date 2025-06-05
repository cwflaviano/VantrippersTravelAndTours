<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Departments_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = "departments";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;

    protected $allowedFields = ['name'];

    public function GetDepartments() {
        return $this->findAll();
    }
}