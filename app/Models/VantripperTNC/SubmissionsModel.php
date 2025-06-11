<?php

namespace App\Models\VantripperTNC;

use CodeIgniter\Model;

class SubmissionsModel extends Model
{
    protected $DBGroup          = 'vantripper_tnc';
    protected $table            = 'submissions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'package_type',
        'email',
        'lead_guest',
        'fb_name',
        'contact_number',
        'created_at',
        'archived',
        'payment_date',
        'payment_ammount',
        'has_payment_receipt'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
