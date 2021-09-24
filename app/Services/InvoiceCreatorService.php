<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Package;

class InvoiceCreatorService
{
    public function execute()
    {
        $invoices = Invoice::where('end_date', '<', now())->get();
        foreach ($invoices as $invoice) {
            $billing = Invoice::where('companyId', $invoice->companyId)->orderBy('id', 'desc')->first();
            $package = Package::find($billing->packageId);
            $company = Company::find($billing->companyId);
            if ($company->status == 1 && $billing->end_date < now() ) {
                Invoice::create([
                    'price' => $package->price,
                    'total_amount' => $package->price,
                    'start_date' => now(),
                    'end_date' => now()->addYear(),
                    'companyId' => $billing->companyId,
                    'packageId' => $billing->packageId,
                ]);
            }
        }
    }
}
