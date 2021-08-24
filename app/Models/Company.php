<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

    public function info()
    {
        return $this->hasOne(CompanyInfo::class,'companyId');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class,'companyId');
    }
}
