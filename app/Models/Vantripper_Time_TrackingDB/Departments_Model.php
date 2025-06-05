<?php

namespace App\Models\Vantripper_Time_TrackingDB;

use CodeIgniter\Model;

class Departments_Model extends Model {
    protected $DBGroup = 'vantripper_time_tracking';
    protected $table = 'departments'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'name', 
        'created_at'
    ];
    protected $useTimestamps = true;
}