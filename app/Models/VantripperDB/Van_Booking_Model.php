<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Van_Booking_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = 'van_bookings'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
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
    protected $useTimestamps = true;    
}