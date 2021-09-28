<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

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
        return $this->hasOne(Company::class,'id','companyId');
    }

    public function payment()
    {
        return $this->hasOne(PaymentMethod::class,'id','paymentId');
    }
}
