<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $casts = [
        'questionImage' => 'boolean',
        'choiceImage' => 'boolean',
    ];

    public function choices() {
        return $this->hasMany(QuestionChoice::class,'questionId');
    }
}
