<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResultType extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_question',
        'correct',
        'in_correct',
        'blank_question',
        'testId',
        'typeId',
        'resultId',
        'userId'
    ];
}
