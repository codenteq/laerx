<?php

namespace App\Services\Admin;

use App\Models\PaymentPlan;
use Illuminate\Support\Str;

class PaymentPlanService
{
    public function store($request)
    {
        PaymentPlan::create([
            'month' => $request->month,
            'description' => Str::title($request->description),
        ]);
    }

    public function update($id, $request)
    {
        PaymentPlan::find($id)->update([
            'month' => $request->month,
            'description' => Str::title($request->description),
        ]);
    }

    public function destroy($id)
    {
        PaymentPlan::find($id)->delete();
    }
}
