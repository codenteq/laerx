<?php

namespace App\Services\Manager;

use App\Jobs\ImageConvertJob;
use App\Models\Company;
use App\Models\CompanyInfo;
use App\Services\ImageConvertService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyService
{
    protected $convertService;

    public function __construct(ImageConvertService $convertService)
    {
        $this->convertService = $convertService;
    }

    public function update($request)
    {
        DB::transaction(function () use ($request) {
            Company::find(companyId())->update([
                'title' => Str::title($request->title)
            ]);
            self::InfoUpdate($request, companyId());
        });
    }

    public function InfoUpdate($request, $id): void
    {
        !$request->file('logo') ? $path = null : $path = $request->file('logo')->store('companies', 'public');

        $info = CompanyInfo::where('companyId', $id)->first();
        $info->tax_no = $request->tax_no;
        $info->email = $request->email;
        $info->website_url = $request->website_url;
        $info->phone = $request->phone;
        $info->countryId = $request->countryId;
        $info->cityId = $request->cityId;
        $info->stateId = $request->stateId;
        $info->address = $request->address;
        $info->zip_code = $request->zip_code;
        $info->save();

        if ($path != null) {
            //ImageConvertJob::dispatch($id, 'company', $path)->onQueue('image');
            $this->convertService->execute($id, 'company', $path);
            //$info->logo = $path;
        }
    }
}
