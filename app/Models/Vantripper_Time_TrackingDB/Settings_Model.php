<?php

namespace App\Models\Vantripper_Time_TrackingDB;

use CodeIgniter\Model;

class Settings_Model extends Model {
    protected $DBGroup = 'vantripper_time_tracking';
    protected $table = 'settings'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'setting_key', 
        'setting_value',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
}