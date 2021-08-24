<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tax_no',
        'email',
        'website_url',
        'phone',
        'countryId',
        'cityId',
        'stateId',
        'address',
        'zip_code',
        'logo',
        'packageId',
        'companyId',
    ];
}
