<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date',
        'end_date'
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
