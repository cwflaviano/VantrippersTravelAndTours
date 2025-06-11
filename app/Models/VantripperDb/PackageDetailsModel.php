<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class PackageDetailsModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'package_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tour_package_id',
        'package_type',
        'description'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
