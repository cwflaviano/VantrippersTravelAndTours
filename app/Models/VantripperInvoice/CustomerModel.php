<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'customer';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'customer_id',
        'invoice_no',
        'email',
        'contact',
        'name',
        'street1',
        'street2',
        'city',
        'state',
        'zip',
        'country',
        'created_at',
        'updated_at',
        'feedback_status',
        'feedback_rating',
        'feedback_comments'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
