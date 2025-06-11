<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class ToursModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'tours';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tour_reference',
        'tour_type',
        'travel_dates',
        'destination',
        'days',
        'pax',
        'lead_guest',
        'contact',
        'pickup_details',
        'balance',
        'payment_status',
        'status',
        'customer_id',
        'invoice_id',
        'created_at',
        'updated_at'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
