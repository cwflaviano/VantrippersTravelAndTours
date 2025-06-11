<?php

namespace App\Models\VantripperTimeTracking;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'vantripper_time_tracking';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username',
        'password',
        'role',
        'employee_id',
        'name',
        'email',
        'created_at',
        'must_change_password'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
