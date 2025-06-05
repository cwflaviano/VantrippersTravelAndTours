<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Tour_Package_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = "tour_package";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'tour_place',
        'tour_category',
        'type_of_package',
        'package_description',
        'package_images',
        'hotel_details',
        'create_at'
    ];

    protected $useTimestamps = true;


    public function GetTourPackage() {
        return $this->findAll();
    }
}