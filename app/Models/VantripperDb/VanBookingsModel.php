<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class VanBookingsModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'van_bookings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'service_id',
        'destination',
        'pax',
        'booking_start',
        'booking_end',
        'pickup_location',
        'dropoff_location',
        'full_name',
        'contact_number',
        'address',
        'email',
        'valid_id_front',
        'valid_id_back',
        'created_at',
        'booking_service'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
