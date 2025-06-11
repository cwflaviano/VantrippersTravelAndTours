<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class CompletedToursModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'completed_tours';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tour_id',
        'assigned_team',
        'followup_status',
        'tail_end',
        'complete_date',
        'notes',
        'travel_dates',
        'destination',
        'tour_type',
        'days',
        'pax',
        'lead_guest'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
