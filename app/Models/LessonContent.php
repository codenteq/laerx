<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonContent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'file',
        'languageId',
        'typeId',
    ];

    public function type()
    {
        return $this->hasOne(QuestionType::class, 'id', 'typeId');
    }

    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'languageId');
    }
}
