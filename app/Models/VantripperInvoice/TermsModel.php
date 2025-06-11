<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class TermsModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'terms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category',
        'details',
        'created_at'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
