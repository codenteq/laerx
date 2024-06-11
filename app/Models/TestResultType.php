<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResultType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'total_question',
        'correct',
        'in_correct',
        'blank_question',
        'testId',
        'typeId',
        'resultId',
        'userId',
    ];

    public function type()
    {
        return $this->hasOne(QuestionType::class, 'id', 'typeId');
    }

    public function result()
    {
        return $this->hasOne(QuestionType::class, 'id', 'resultId');
    }
}
