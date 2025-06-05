<?php

namespace App\Models\Vantripper_Time_TrackingDB;

use CodeIgniter\Model;

class Employees_Model extends Model {
    protected $DBGroup = 'vantripper_time_tracking';
    protected $table = 'employees'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'employee_id', 
        'name',
        'type',
        'created_at',
        'department_id'    
    ];
    protected $useTimestamps = true;
}