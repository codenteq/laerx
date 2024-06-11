<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'subdomain',
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

    public function info()
    {
        return $this->hasOne(CompanyInfo::class, 'companyId');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'companyId');
    }
}
