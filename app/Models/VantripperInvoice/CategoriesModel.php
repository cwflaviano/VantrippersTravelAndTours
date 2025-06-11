<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [ 'category_name' ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
