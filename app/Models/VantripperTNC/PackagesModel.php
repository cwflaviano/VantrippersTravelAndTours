<?php

namespace App\Models\VantripperTNC;

use CodeIgniter\Model;

class PackagesModel extends Model
{
    protected $DBGroup          = 'vantripper_tnc';
    protected $table            = 'packages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'name' ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
