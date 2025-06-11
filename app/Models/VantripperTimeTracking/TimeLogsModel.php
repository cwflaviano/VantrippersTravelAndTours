<?php

namespace App\Models\VantripperTimeTracking;

use CodeIgniter\Model;

class TimeLogsModel extends Model
{
    protected $DBGroup          = 'vantripper_time_tracking';
    protected $table            = 'time_logs';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
