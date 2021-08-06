<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveLesson extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function period()
    {
        return $this->hasOne(Period::class,'periodId');
    }

    public function group()
    {
        return $this->hasOne(Group::class,'groupId');
    }

    public function questionType()
    {
        return $this->hasOne(QuestionType::class,'typeId');
    }
}
