<?php

namespace App\Models\VantripperDB;

use CodeIgniter\Model;

class Question_model extends Model {
    protected $DBGroup = 'vantripper_db';
    protected $table = 'quetions'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'question_text', 
        'position',
        'created_at',
        'updated_at'      
    ];
    protected $useTimestamps = true;
}