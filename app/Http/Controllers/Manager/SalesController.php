<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Services\Payment\PayService;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::where('companyId', companyId())->get();
        $invoice = Invoice::where('companyId', companyId())->orderBy('id', 'desc')->first();
        $payment_methods = session('invoice') ? PaymentMethod::where('status', 1)->get() : null;
        return view('manager.sales.invoice', compact('invoices', 'payment_methods', 'invoice'));
    }

    public function payOnline(PayService $payService)
    {
        $paymentForm = $payService->pay();
        return view('manager.sales.online-payment', compact('paymentForm'));
    }

    public function payOnlineCallback(PayService $payService, Request $request, $companyId, $couponId = null)
    {
        $requestIyzico = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
        $requestIyzico->setLocale(\Iyzipay\Model\Locale::TR);
        $requestIyzico->setToken($request->token);
        $checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($requestIyzico, $payService->options());
        if ($checkoutForm->getPaymentStatus() == 'SUCCESS') {
            $payService->paySuccess($companyId, $couponId);
            return redirect()->route('manager.dashboard');
        } else {
            return redirect()->route('manager.sales.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $user = User::where('type', User::Manager)->whereRelation('info', 'companyId', $invoice->companyId)->first();
        return view('email.invoice', compact('invoice', 'user'));
    }
}
