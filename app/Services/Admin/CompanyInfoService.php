<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\CompanyRequest;
use App\Jobs\ImageConvertJob;
use App\Models\CompanyInfo;

class CompanyInfoService
{
    /**
     * @var InvoiceService
     */
    private $invoiceService;

    /**
     * @param InvoiceService $invoiceService
     */
    public function __construct(InvoiceService $invoiceService) {
        $this->invoiceService = $invoiceService;
    }

    /**
     * @param CompanyRequest $request
     * @param $id
     */
    public function store(CompanyRequest $request, $id) : void
    {
        !$request->file('logo') ? $path = null : $path = $request->file('logo')->store('companies','public');
        if ($path != null)
            ImageConvertJob::dispatch($id, 'company', $path)->onQueue('image');
        CompanyInfo::create([
            'tax_no' => $request->tax_no,
            'email' => $request->email,
            'website_url' => $request->website_url,
            'phone' => $request->phone,
            'countryId' => $request->countryId,
            'cityId' => $request->cityId,
            'stateId' => $request->stateId,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'packageId' => $request->packageId,
            'logo' => $path,
            'companyId' => $id,
        ]);
        $this->invoiceService->store($request,$id);
    }

    /**
     * @param CompanyRequest $request
     * @param $id
     */
    public function update(CompanyRequest $request, $id) : void
    {
        !$request->file('logo') ? $path = null : $path = $request->file('logo')->store('companies','public');
        if ($path != null)
            ImageConvertJob::dispatch($id, 'company', $path)->onQueue('image');
        CompanyInfo::where('companyId',$id)->update([
            'tax_no' => $request->tax_no,
            'email' => $request->email,
            'website_url' => $request->website_url,
            'phone' => $request->phone,
            'countryId' => $request->countryId,
            'cityId' => $request->cityId,
            'stateId' => $request->stateId,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'packageId' => $request->packageId,
            'logo' => $path,
            'companyId' => $id,
        ]);
    }

    public function destroy($id) : void
    {
        CompanyInfo::where('companyId',$id)->delete();
        $this->invoiceService->destroy($id);
    }
}
