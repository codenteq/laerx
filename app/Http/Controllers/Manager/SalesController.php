<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Services\Payment\PayService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    // TODO: İyzico payment method
    // TODO: Invoice pdf template

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

    public function postCouponCode(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->where('start_date', '<=', now())->where('end_date', '>=', now())->first();
        if ($coupon) {
            $invoice = Invoice::where('companyId', companyId())->orderBy('id', 'desc')->first();
            $discount = $invoice->price / 100 * $coupon->discount;
            $data = [
                'price' => $invoice->price,
                'total_amount' => $invoice->price - $discount,
                'discount' => $discount,
                'couponId' => $coupon->id
            ];
            session(['cart' => $data]);
            return response()->json($data);
        }
        return response(ResponseMessage::CouponMessage);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('manager.sales.view');
    }
}
