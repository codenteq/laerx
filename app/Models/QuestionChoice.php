<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionChoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'path',
        'questionId'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function choiceKey() {
        return $this->hasOne(QuestionChoiceKey::class,'questionId','questionId');
    }
}
