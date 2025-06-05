<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Users_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = "users";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'emp_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'address',
        'birthdate',
        'age',
        'email',
        'password',
        'contact',
        'position',
        'date_of_joining',
        'type_of_contract',
        'profile_image',
        'department_id',
        'role_id',
        'remember_token',
        'status',
        'profile_picture',
        'user_delete',
        'user_archived'
    ];

    protected $useTimestamps = true;


    ## Get all columns rows
    public function GetUsers() {
        return $this->findAll();
    }

    ## Get a column
    public function GetUsersByColumName($columnName, $columnData) {
        return $this->where($columnName, $columnData)->first();
    }

    ## get a column with constraints
    public function GetUserByiD($user_id) {
        return $this->db->query("   SELECT  u.id,
                                            u.emp_id,
                                            u.first_name, 
                                            u.middle_name, 
                                            u.last_name, 
                                            u.gender, 
                                            u.email, 
                                            u.contact,
                                            u.position,
                                            u.type_of_contract,
                                            d.name as department_name,
                                            r.name as role_name,
                                            u.status,
                                            u.date_of_joining,
                                            u.birthdate,
                                            u.address,
                                            u.profile_picture
                                    FROM users u
                                    JOIN departments d
                                        ON u.department_id = d.id
                                    JOIN roles r
                                        ON u.role_id = r.id
                                    WHERE u.id = {$user_id}")->getRow();

    }

    ## get the first result of users by email
    public function GetUsersByEmail($email){
        return $this->where('email', $email)->first();   
    }

    ## get all users along with their departments and roles by filters
    public function GetAllUsersByFIlters($filter1, $filter2) {
        return $this->db->query("  SELECT u.id, 
                                               u.emp_id, 
                                               u.first_name, 
                                               u.middle_name, 
                                               u.last_name, 
                                               u.gender, 
                                               u.email, 
                                               u.contact,
                                               u.position,
                                               u.type_of_contract,
                                               d.name as department_name,
                                               r.name as role_name,
                                               u.status,
                                               u.user_archived
                                        FROM users u
                                        JOIN departments d
                                            ON u.department_id = d.id
                                        JOIN roles r
                                            ON u.role_id = r.id
                                        WHERE u.user_delete = 0 AND {$filter1}{$filter2}")->getResult();
    }

    ## get the maximum primary id in database
    public function GetMaxId() {
        $query = $this->db->query("SELECT MAX(id) as max_id FROM users")->getRow();
        $max_id = $query->max_id;
        return $max_id;
    }

    ## Insert new user
    public function InsertNewUser($data) {
       return $this->insert($data);
    }

    ## Update user_delete column
    public function UpdateUser($user_id, $data) {
        return $this->update($user_id, $data);
    }
}