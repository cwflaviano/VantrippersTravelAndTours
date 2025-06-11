<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
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


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
