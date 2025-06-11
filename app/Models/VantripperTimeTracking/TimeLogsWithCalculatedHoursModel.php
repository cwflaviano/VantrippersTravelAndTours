<?php

namespace App\Models\VantripperTimeTracking;

use CodeIgniter\Model;

class TimeLogsWithCalculatedHoursModel extends Model
{
    protected $DBGroup          = 'vantripper_time_tracking';
    protected $table            = 'time_logs_with_calculated_hours';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'setting_key',
        'setting_value',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
