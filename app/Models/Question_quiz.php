<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'question_id',
        'score'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
