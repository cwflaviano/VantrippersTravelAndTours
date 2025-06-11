<?php

namespace App\Models\VantripperTimeTracking;

use CodeIgniter\Model;

class AuditLogsModel extends Model
{
    protected $DBGroup          = 'vantripper_time_tracking';
    protected $table            = 'audit_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'action',
        'table_name',
        'record_id',
        'details',
        'created_at'
    ];

 
    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
