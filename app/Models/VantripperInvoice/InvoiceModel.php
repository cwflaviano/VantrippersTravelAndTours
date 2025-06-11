<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'invoice';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'invoice_no',
        'customer_name',
        'address_street1',
        'address_street2',
        'address_city',
        'address_state',
        'address_zip',
        'address_country',
        'date',
        'due_date',
        'po_id',
        'payment_methods',
        'terms',
        'notes',
        'sub_total',
        'total_price',
        'discount_ammount',
        'deposit_ammount',
        'ammount_due',
        'attachment',
        'document',
        'status',
        'created_at',
        'updated_at',
        'kids',
        'bed',
        'nights',
        'breakfast',
        'transpo',
        'airfare',
        'island_hopping',
        'signature',
        'quantity',
        'created_by',
        'invoice_status',
        'less_ammount',
        'less_ammount_desc',
        'discount_desc',
        'travel_departure_datetime',
        'pickup_point',
        'payment_received',
        'final_payment',
        'final_payment_desc'
    ];

   
    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
