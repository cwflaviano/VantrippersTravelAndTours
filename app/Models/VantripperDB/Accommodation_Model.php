<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Accommodation_Model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = "accomodation";
    protected $primaryKey = "id";
    
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'email', 
        'place',
        'fb',
        'hotel_name',
        'room_type',
        'total_rate',
        'per_head',
        'capacity',
        'star_rating',
        'pet_friendly',
        'breakfast',
        'pool',
        'elevator',
        'function_hall',
        'distance_from',
        'distance_location',
        'pin_location',
        'description',
        'remarks',
        'created_by',
        'updated_by',
        'create_at',
        'favorite_status',
        'can_accommodate',
        'season_type',
        'season_start_date',
        'season_end_date',
        'contact',
        'beachfront',
        'area'
    ];

    protected $useTimestamps = true;
    
    public function GetAccomodation() {
        return $this->findAll();
    }
}