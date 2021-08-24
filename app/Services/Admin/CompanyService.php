<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\CompanyRequest;
use App\Models\Company;
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
        $company = Company::create([
            'title' => Str::title($request->title)
        ]);
        $this->companyInfoService->store($request, $company->id);
    }

    /**
     * @param CompanyRequest $request
     * @param $id
     */
    public function update(CompanyRequest $request, $id): void
    {
        Company::find($id)->update([
            'title' => Str::title($request->title)
        ]);
        $this->companyInfoService->update($request, $id);
    }
}
