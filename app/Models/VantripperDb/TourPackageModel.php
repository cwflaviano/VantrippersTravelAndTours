<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class TourPackageModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'tour_packages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tour_place',
        'tour_category',
        'type_of_package',
        'package_description',
        'package_image',
        'package_images',
        'hotel_details',
        'created_at'
    ];

 
    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
