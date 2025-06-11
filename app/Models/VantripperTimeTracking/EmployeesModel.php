<?php

namespace App\Models\VantripperTimeTracking;

use CodeIgniter\Model;

class EmployeesModel extends Model
{
    protected $DBGroup          = 'vantripper_time_tracking';
    protected $table            = 'employees';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'employee_id',
        'name',
        'type',
        'created_at',
        'department_id'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
