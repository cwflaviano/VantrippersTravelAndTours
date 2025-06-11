<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class ClientsModel extends Model
{

    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'clients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'cid',
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'gender',
        'birth_date',
        'age',
        'mobile_number',
        'email',
        'password',
        'created_at'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;

}
