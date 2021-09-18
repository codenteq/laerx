<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function getManagerDashboard()
    {
        $invoice = null;
        if (session('invoice')) {
            $invoice = Invoice::where('companyId', companyId())->orderBy('id', 'desc')->first();
            $data = [
                'price' => $invoice->price,
                'total_amount' => $invoice->price,
                'discount' => 0,
                'couponId' => null
            ];
            session(['cart' => $data]);
        }

        $payment_methods = session('invoice') ? PaymentMethod::where('status', 1)->get() : null;
        return view('manager.index', compact('payment_methods', 'invoice'));
    }
}
