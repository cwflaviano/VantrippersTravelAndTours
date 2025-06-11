<?php

namespace App\Models\VantripperTNC;

use CodeIgniter\Model;

class PaymentReceiptsModel extends Model
{
    protected $DBGroup          = 'vantripper_tnc';
    protected $table            = 'payment_receipts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'submission_id',
        'file_name',
        'file_path',
        'upload_date'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
