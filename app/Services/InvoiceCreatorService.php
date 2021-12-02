<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Package;
use App\Models\PaymentPlan;

class InvoiceCreatorService
{
    public function execute()
    {
        $invoices = Invoice::where('end_date', '<', now())->get();
        foreach ($invoices as $invoice) {
            $billing = Invoice::where('companyId', $invoice->companyId)->orderBy('id', 'desc')->first();
            $company = Company::find($billing->companyId);
            $paymentPlan = PaymentPlan::find($company->info->planId);
            $package = Package::where('planId', $company->info->planId)->first();
            if ($company->status == 1 && $billing->end_date < now() ) {
                Invoice::create([
                    'price' => $package->price,
                    'total_amount' => $package->price,
                    'start_date' => now(),
                    'end_date' => now()->addMonths($paymentPlan->month),
                    'companyId' => $billing->companyId,
                    'packageId' => $package->id,
                ]);
            }
        }
    }
}
