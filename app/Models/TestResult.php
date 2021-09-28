<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'total_question',
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

    public function test()
    {
        return $this->hasOne(Test::class, 'id', 'testId');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','userId');
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class,'userId','userId');
    }
}
