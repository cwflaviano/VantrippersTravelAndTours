<?php

namespace App\Models\Vantripper_Time_TrackingDB;

use CodeIgniter\Model;

class Time_Logs_Model extends Model {
    protected $DBGroup = 'vantripper_time_tracking';
    protected $table = 'time_logs'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'employee_id',
        'log_date', 
        'time_id',
        'time_out',
        'break_start',
        'break_end',
        'total_hours',
        'status',
        'created_at'
    ];
    protected $useTimestamps = true;
    
    ## Get user username by id
    public function GetUserByUsername($username) {
        return $this->where('username', $username)->first();
    }
}