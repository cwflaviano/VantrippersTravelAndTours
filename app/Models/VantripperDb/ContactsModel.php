<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class ContactsModel extends Model
{
    protected $DBGroup          = 'vantripper_db';
    protected $table            = 'contacts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'email',
        'subject',
        'message',
        'created_at'
    ];

  
    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
