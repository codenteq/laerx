<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Invoice;
use App\Models\Package;
use Carbon\Carbon;

class InvoiceService
{
    /**
     * @var null
     */
    private $price = null;

    public function __construct() {
        $request = request();
        if ($request->packageId) {
            $package = Package::find($request->packageId);
            $this->price = $package->price;
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
            'end_date' => Carbon::create($request->start_date)->addYear(),
            'packageId' => $request->packageId,
            'companyId' => $id,
        ]);
    }

    public function destroy($id) : void
    {
        Invoice::where('companyId',$id)->delete();
    }
}
