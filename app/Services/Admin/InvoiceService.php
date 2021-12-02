<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Invoice;
use App\Models\Package;
use App\Models\PaymentPlan;
use Carbon\Carbon;

class InvoiceService
{
    /**
     * @var null
     */
    private $price = null;
    private $month = null;
    private $packageId = null;

    public function __construct() {
        $request = request();
        if ($request->planId) {
            $plan = PaymentPlan::find($request->planId);
            $package = Package::where('planId', $request->planId)->first();
            $this->price = $package->price;
            $this->packageId = $package->id;
            $this->month = $plan->month;
        }
    }

    /**
     * @param CompanyRequest $request
     * @param $id
     */
    public function store(CompanyRequest $request, $id) : void
    {
        Invoice::create([
            'price' => $this->price,
            'start_date' => $request->start_date,
            'end_date' => Carbon::create($request->start_date)->addMonths($this->month),
            'packageId' => $this->packageId,
            'companyId' => $id,
        ]);
    }

    public function destroy($id) : void
    {
        Invoice::where('companyId',$id)->delete();
    }
}
