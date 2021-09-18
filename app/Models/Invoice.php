<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
