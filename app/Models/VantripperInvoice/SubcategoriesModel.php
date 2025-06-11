<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class SubcategoriesModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'subcategories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id',
        'subcategory_name',
        'details'
    ];

   
    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
