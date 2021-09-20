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
        session(['invoice' => false]);
        if (auth()->user()->type == User::Manager && $invoice->status != 1) {
            session(['invoice' => true]);
            $route = $request->route()->getName();
            if ($route == 'manager.dashboard' || $route == 'manager.invoice.index' || $route == 'manager.pay.online' || $route == 'manager.pay.callback') {
                return $next($request);
            }
            return back();
        } else if (auth()->user()->type == User::Normal && $invoice->status != 1) {
            return redirect()->route('logout-user');
        } else if (auth()->user()->type == User::Teacher && $invoice->status != 1) {
            return redirect()->route('logout-user');
        }
        return $next($request);
    }
}
