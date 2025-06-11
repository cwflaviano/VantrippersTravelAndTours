<?php

namespace App\Models\VantripperTNC;

use CodeIgniter\Model;

class TermsQuestionsModel extends Model
{
    protected $DBGroup          = 'vantripper_tnc';
    protected $table            = 'terms_questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'package_id',
        'question_text',
        'yes_option',
        'no_option',
        'sort_order',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
