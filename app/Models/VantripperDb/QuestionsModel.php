<?php

namespace App\Models\VantripperDb;

use CodeIgniter\Model;

class QuestionsModel extends Model
{
    protected $DBGroup          = 'vantripper_db';

    protected $table            = 'questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'question_text',
        'position',
        'created_at',
        'updated_at'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
