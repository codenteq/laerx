<?php

namespace App\Services\Admin;

use App\Models\Coupon;
use Illuminate\Support\Str;

class CouponService
{
    public function store($request)
    {
        Coupon::create([
           'code' => Str::slug($request->code,'_'),
           'discount' => $request->discount,
           'start_date' => $request->start_date,
           'end_date' => $request->end_date
        ]);
    }

    public function update($couponId, $request)
    {
        Coupon::find($couponId)->update([
            'code' => Str::slug($request->code,'_'),
            'discount' => $request->discount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);
    }
}
