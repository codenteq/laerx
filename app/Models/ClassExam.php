<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassExam extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'companyId',
        'periodId',
        'monthId',
        'groupId',
        'status',
    ];

    public function classExamQuestionType(): HasMany
    {
        return $this->hasMany(ClassExamQuestionType::class, 'classExamId');
    }
}
