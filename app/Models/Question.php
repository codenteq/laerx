<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'typeId',
        'questionImage',
        'choiceImage',
        'imagePath',
        'languageId',
        'typeId'
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'questionImage' => 'boolean',
        'choiceImage' => 'boolean',
    ];

    public function choice() {
        return $this->hasMany(QuestionChoice::class,'questionId','id');
    }

    public function company()
    {
        return $this->hasOne(Company::class,'companyId');
    }

    public function questionType()
    {
        return $this->hasOne(QuestionType::class,'typeId');
    }

    public function language()
    {
        return $this->hasOne(Language::class,'id','languageId');
    }
}
