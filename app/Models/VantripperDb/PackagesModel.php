<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class PackagesModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'packages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title',
        'slug',
        'destination_id',
        'tour_category_id',
        'tour_type_id',
        'gallery_destination_slug',
        'pacakges_type',
        'frontend_category',
        'tour_type',
        'sub_type',
        'duration',
        'subtitle',
        'description',
        'inclusions',
        'exclusions',
        'active',
        'featured',
        'display_order',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
