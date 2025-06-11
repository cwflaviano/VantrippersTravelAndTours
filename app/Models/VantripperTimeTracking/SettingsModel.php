<?php

namespace App\Models\VantripperTimeTracking;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $DBGroup          = 'vantripper_time_tracking';
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'employee_id',
        'log_date',
        'time_in',
        'time_out',
        'break_start',
        'break_end',
        'total_hours',
        'status',
        'created_at',
        'extra_hours',
        'double_hours',
        'updated_at',
        'updated_by',
        'name',
        'type',
        'calculated_total_hours',
        'total_overtime_value'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
