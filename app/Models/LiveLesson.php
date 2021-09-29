<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveLesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'live_date',
        'url',
        'periodId',
        'monthId',
        'groupId',
        'typeId',
        'companyId'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function period()
    {
        return $this->hasOne(Period::class,'id','periodId');
    }

    public function group()
    {
        return $this->hasOne(Group::class,'id','groupId');
    }

    public function type()
    {
        return $this->hasOne(QuestionType::class,'id','typeId');
    }

    public function month()
    {
        return $this->hasOne(Month::class,'id','monthId');
    }
}
