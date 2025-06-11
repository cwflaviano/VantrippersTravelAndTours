<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class TourDetailsModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'tour_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tour_id',
        'accommodation',
        'room_setup',
        'booked_accommodation',
        'coordinated_supplier',
        'hotel_balance',
        'van_details_sent',
        'with_coordinator',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
