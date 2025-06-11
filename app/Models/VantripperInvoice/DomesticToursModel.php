<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class DomesticToursModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'domestic_tours';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'travel_dates',
        'destination',
        'days',
        'pax',
        'lead_guest',
        'contact',
        'pickup_details',
        'balance',
        'payment_status',
        'accommodation',
        'booked_accommodation',
        'coordinated_supplier',
        'hotel_balance',
        'transpo_details_sent',
        'handled_by',
        'status',
        'notes',
        'created_at',
        'updated_at',
        'transfer_details_sent',
        'coordinated_with_supplier'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
