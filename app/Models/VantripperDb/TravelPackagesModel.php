<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class TravelPackagesModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'travel_packages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'image',
        'details',
        'created_at'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;




    public function getAllTravelPackages() {
        return $this->db->query("SELECT * FROM travel_packages")->getResult();
    }
}
