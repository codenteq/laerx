<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'questionId',
        'companyId'
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'questionId');
    }
}
