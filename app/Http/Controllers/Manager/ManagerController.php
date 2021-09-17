<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function getManagerDashboard()
    {
        $payment_methods = session('invoice') ? PaymentMethod::where('status', 1)->get() : null;
        return view('manager.index', compact('payment_methods'));
    }
}
