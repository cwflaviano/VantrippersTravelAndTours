<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class RolePermissionsModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'role_permissions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'role_id', 
        'permission_id'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
