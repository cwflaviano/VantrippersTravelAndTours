<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class ServicesModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
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

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;


    public function getAllServices() {
        return $this->db->query("SELECT id, title, price, image, specs, gear, people, bags, description, inclusion, exclusion, status FROM services ORDER BY id ASC")->getResultArray();
    }
}
