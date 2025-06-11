<?php

namespace App\Models\VantripperTimeTracking;

use CodeIgniter\Model;

class DepartmentsModel extends Model
{
    protected $DBGroup          = 'vantripper_time_tracking';
    protected $table            = 'departments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'created_at'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
