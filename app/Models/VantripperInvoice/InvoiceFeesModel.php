<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class InvoiceFeesModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'invoice_fees';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'invoice_no',
        'fee_type',
        'fee_description',
        'fee_price',
        'created_at',
        'updated_at'
    ];

  
    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
