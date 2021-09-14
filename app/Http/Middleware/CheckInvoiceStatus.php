<?php

namespace App\Http\Middleware;

use App\Models\Invoice;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckInvoiceStatus
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $invoice = Invoice::select('status')->where('companyId', companyId())->orderBy('id', 'desc')->first();
        if (auth()->user()->type == User::Manager) {
            session(['invoice' => $invoice->status]);
            return $next($request);
        } else if (auth()->user()->type == User::Normal && $invoice->status != 1) {
            return redirect()->route('logout-user');
        } else if (auth()->user()->type == User::Teacher && $invoice->status != 1) {
            return redirect()->route('logout-user');
        }

        return $next($request);
    }
}
