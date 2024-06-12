<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionChoiceKey extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'questionId',
        'choiceId',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function question()
    {
        return $this->hasOne(Question::class, 'questionId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function choice()
    {
        return $this->hasOne(QuestionChoice::class, 'choiceId');
    }
}
