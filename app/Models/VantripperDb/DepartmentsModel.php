<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class DepartmentsModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'departments';
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
