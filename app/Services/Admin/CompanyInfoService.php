<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\CompanyRequest;
use App\Jobs\ImageConvertJob;
use App\Models\CompanyInfo;
use App\Services\ImageConvertService;

class CompanyInfoService
{
    /**
     * @var InvoiceService
     */
    private $invoiceService;
    protected $convertService;

    /**
     * @param InvoiceService $invoiceService
     * @param ImageConvertService $convertService
     */
    public function __construct(InvoiceService $invoiceService, ImageConvertService $convertService)
    {
        $this->invoiceService = $invoiceService;
        $this->convertService = $convertService;
    }

    /**
     * @param CompanyRequest $request
     * @param $id
     */
    public function store(CompanyRequest $request, $id): void
    {
        !$request->file('logo') ? $path = null : $path = $request->file('logo')->store('companies', 'public');
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
            'planId' => $request->planId,
            'logo' => $path,
            'companyId' => $id,
        ]);

        if ($path != null){
            //ImageConvertJob::dispatch($id, 'company', $path)->onQueue('image');
            $this->convertService->execute($id, 'company', $path);
        }

        $this->invoiceService->store($request, $id);
    }

    /**
     * @param CompanyRequest $request
     * @param $id
     */
    public function update(CompanyRequest $request, $id): void
    {
        !$request->file('logo') ? $path = null : $path = $request->file('logo')->store('companies', 'public');

        CompanyInfo::where('companyId', $id)->update([
            'tax_no' => $request->tax_no,
            'email' => $request->email,
            'website_url' => $request->website_url,
            'phone' => $request->phone,
            'countryId' => $request->countryId,
            'cityId' => $request->cityId,
            'stateId' => $request->stateId,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'planId' => $request->planId,
            'logo' => $path,
            'companyId' => $id,
        ]);

        if ($path != null){
            //ImageConvertJob::dispatch($id, 'company', $path)->onQueue('image');
            $this->convertService->execute($id, 'company', $path);
        }
    }

    public function destroy($id): void
    {
        CompanyInfo::where('companyId', $id)->delete();
        $this->invoiceService->destroy($id);
    }
}
