<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanyService
{
    /**
     * @var CompanyInfoService
     */
    private $companyInfoService;

    /**
     * @param CompanyInfoService $companyInfoService
     */
    public function __construct(CompanyInfoService $companyInfoService)
    {
        $this->companyInfoService = $companyInfoService;
    }

    /**
     * @param CompanyRequest $request
     */
    public function store(CompanyRequest $request): void
    {
        DB::transaction(function () use ($request) {
            $company = Company::create([
                'title' => Str::title($request->title),
                'subdomain' => Str::slug($request->subdomain)
            ]);
            $this->companyInfoService->store($request, $company->id);
        });
    }

    /**
     * @param CompanyRequest $request
     * @param $id
     */
    public function update(CompanyRequest $request, $id): void
    {
        DB::transaction(function () use ($id, $request) {
            Company::find($id)->update([
                'title' => Str::title($request->title),
                'subdomain' => Str::slug($request->subdomain)
            ]);
            $this->companyInfoService->update($request, $id);
        });
    }

    public function destroy($id): void
    {
        Company::find($id)->delete();
        $this->companyInfoService->destroy($id);
    }
}
