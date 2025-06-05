<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Travel_Package_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = 'travel_packages';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'name',
        'image',
        'details',
        'created_at'
    ];
    protected $useTimestamps = true;

    ## Get All columns array results
    public function GetTravelPackages() {
        return $this->findAll();
    }
}