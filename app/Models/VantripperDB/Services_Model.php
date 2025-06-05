<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Services_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'title',
        'price',
        'image',
        'specs',
        'description',
        'created_at',
        'gear',
        'people',
        'bags',
        'inclusion',
        'exclusion',
        'status',
        'archived'
    ];
    protected $useTimestamps = true;

    ## Get All columns array results
    public function GetServices() {
        return $this->findAll();
    }

    ## Get all row by ID
    public function GetServicesByID($id) {
        return $this->db->query(" SELECT id, title, price, image, specs, gear, people, bags, description, inclusion, exclusion, status FROM services WHERE id = ?", [$id])
                    ->getRow();
    }

    ## Get services row limit by one and order by id
    public function GetServicesOrderByIDWithLimmit() {
        return $this->db->query("SELECT id, title, price, image, specs, gear, people, bags, description, inclusion, exclusion, status FROM services ORDER BY id ASC LIMIT 1")
                    ->getRow();
    }
}