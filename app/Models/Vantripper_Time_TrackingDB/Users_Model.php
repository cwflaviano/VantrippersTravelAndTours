<?php

namespace App\Models\Vantripper_Time_TrackingDB;

use CodeIgniter\Model;

class Users_Model extends Model {
    protected $DBGroup = 'vantripper_time_tracking';
    protected $table = 'users'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'username', 
        'password',
        'role',
        'employee_id',
        'name',
        'email',
        'created_at',
        'must_change_password'
    ];
    protected $useTimestamps = true;
    
    ## Get user username by id
    public function GetUserByUsername($username) {
        return $this->where('username', $username)->first();
    }

    ## Get Admin account
    public function GetAdmiAccount() {
        return $this->db->query("SELECT * FROM users WHERE username = 'admin' AND role = 'admin' AND name = 'System Administrator'")->getRowArray();
    }
    ## Add default admin account
    public function InsertDefaultAdminAccount() {
        $adminName = 'admin';
        $adminPassword = password_hash('admin123', PASSWORD_DEFAULT);
        return $this->db->query("INSERT INTO users (username, password, role, name, email) VALUES (?, ?, 'admin', 'System Administrator', 'admin@timetracker.com')", [$adminName, $adminPassword]);
    }
}