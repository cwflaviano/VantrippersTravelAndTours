<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class LuzonExclusiveModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'luzon_exclusives';
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
        'with_coordinator',
        'lead_guest',
        'contact',
        'pickup_details',
        'balance',
        'payment_status',
        'accommodation',
        'room_setup',
        'booked_accommodation',
        'van_details_sent',
        'assigned_team',
        'status',
        'notes',
        'created_at',
        'updated_at',
        'pickup_point'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
