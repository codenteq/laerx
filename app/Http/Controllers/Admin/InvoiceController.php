<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\PaymentMethod;
use App\Models\User;
use App\Services\Payment\PayService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function getInvoice($companyId)
    {
        $invoice = Invoice::where('companyId', $companyId)->orderBy('id', 'desc')->first();
        if ($invoice->status == 0) {
            $data = [
                'price' => $invoice->price,
                'total_amount' => $invoice->price,
                'discount' => 0,
                'couponId' => null
            ];
            session(['cart' => $data]);
        }

        $invoices = Invoice::where('companyId', $companyId)->latest()->get();
        return view('admin.company.invoice.invoice', compact('invoices', 'companyId'));
    }

    public function postConfirmPay(Request $request, PayService $payService)
    {
        try {
            $payment = PaymentMethod::where('code', 'wire_transfer')->first();
            $payService->paySuccess($request->companyId, session('cart')['couponId'], $payment->id);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::IgnoreDateMessage());
        }
    }

    public function getInvoiceShow($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        $user = User::where('type', User::Manager)->whereRelation('info', 'companyId', $invoice->companyId)->first();
        return view('email.invoice', compact('invoice', 'user'));
    }
}
