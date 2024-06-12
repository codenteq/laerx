<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BugQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['questionId'];

    public function companyQuestion(): HasOne
    {
        return $this->hasOne(CompanyQuestion::class, 'questionId', 'questionId');
    }

    public function question(): HasOne
    {
        return $this->hasOne(Question::class, 'id', 'questionId');
    }
}
