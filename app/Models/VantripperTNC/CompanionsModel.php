<?php

namespace App\Models\VantripperTNC;

use CodeIgniter\Model;

class CompanionsModel extends Model
{
    protected $DBGroup          = 'vantripper_tnc';
    protected $table            = 'companions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'submission_id',
        'full_name',
        'created_at'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
