<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class AccommodationModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'accommodation';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
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
        'beachfront',
        'distance_from',
        'distance_location',
        'area',
        'pin_location',
        'discription',
        'reamarks',
        'created_by',
        'updated_by',
        'favorite_status',
        'can_accommodate',
        'season_type',
        'season_start_date',
        'season_end_date',
        'contact'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
