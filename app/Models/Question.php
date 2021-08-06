<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $casts = [
        'questionImage' => 'boolean',
        'choiceImage' => 'boolean',
    ];

    public function choice() {
        return $this->hasMany(QuestionChoice::class,'questionId');
    }

    public function company()
    {
        return $this->hasOne(Company::class,'companyId');
    }

    public function questionType()
    {
        return $this->hasOne(QuestionType::class,'typeId');
    }
}
