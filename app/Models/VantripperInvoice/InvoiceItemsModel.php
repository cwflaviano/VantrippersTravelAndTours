<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class InvoiceItemsModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'invoice_items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'invoice_no',
        'package_title',
        'description',
        'quantity',
        'rate',
        'ammount',
        'created_at',
        'updated_at'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
