<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    use HasFactory;

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
