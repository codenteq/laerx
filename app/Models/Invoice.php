<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'discount_amount',
        'total_amount',
        'companyId',
        'start_date',
        'end_date',
        'packageId',
        'paymentId',
        'couponId',
        'status'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class,'id','companyId');
    }
}
