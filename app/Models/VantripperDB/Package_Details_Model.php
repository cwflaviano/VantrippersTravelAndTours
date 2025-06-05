<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Package_Details_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = "package_details";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'tour_packages_id',
        'package_type',
        'description'
    ];


    public function GetPackageDetails() {
        return $this->findAll();
    }
}