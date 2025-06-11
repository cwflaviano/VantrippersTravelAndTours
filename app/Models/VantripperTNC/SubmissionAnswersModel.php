<?php

namespace App\Models\VantripperTNC;

use CodeIgniter\Model;

class SubmissionAnswersModel extends Model
{
    protected $DBGroup          = 'vantripper_tnc';
    protected $table            = 'submission_answers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'submission_id',
        'question_id',
        'answer'
    ];


    protected bool $allowEmptyInserts = true;
    protected bool $updateOnlyChanged = true;

    // Dates
    protected $useTimestamps = true;
}
