<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class InvoicePackageModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'invoice_packages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'sku',
        'quantity',
        'category',
        'items',
        'item_full_details',
        'price',
        'created_at'
    ];

  
    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
