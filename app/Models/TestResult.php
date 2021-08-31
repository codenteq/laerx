<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'point',
        'correct',
        'in_correct',
        'blank_question',
        'testId',
        'userId'
    ];

    public function testQuestion()
    {
        return $this->hasOne(TestQuestion::class, 'testId','testId');
    }
}
