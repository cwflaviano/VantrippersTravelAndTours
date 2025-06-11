<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class CancelledToursModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'cancelled_tours';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tour_id',
        'cancellation_reason',
        'refund_status',
        'cancellation_date',
        'days',
        'pax',
        'with_coordinator',
        'pickup_point',
        'balance',
        'payment_status',
        'accommodation',
        'room_setup',
        'booked_accommodation',
        'van_details_sent',
        'assigned_team',
        'status',
        'notes',
        'cancellation_person',
        'lead_guest',
        'contact',
        'destination',
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
