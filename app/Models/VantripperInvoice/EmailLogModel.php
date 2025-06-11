<?php

namespace App\Models\VantripperInvoice;

use CodeIgniter\Model;

class EmailLogModel extends Model
{
    protected $DBGroup          = 'vantripper_invoice';
    protected $table            = 'email_log';
    protected $primaryKey       = 'log_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'customer_id',
        'invoice_no',
        'subject',
        'body_html',
        'body_text',
        'sent_at',
        'email_status',
        'error_messages',
        'item_type',
        'recipient_type',
        'address',
        'file_name',
        'file_path'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
