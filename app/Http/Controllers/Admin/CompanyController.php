<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Invoice;
use App\Models\Package;
use App\Models\State;
use App\Services\Admin\CompanyService;

class CompanyController extends Controller
{
    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = cache()->remember('companies', 60, function () {
            return Company::with('companies')->get();
        });
        return view('admin.company.company', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.company-add', [
            'packages' => Package::all(),
            'countries' => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Admin\CompanyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        try {
            $this->companyService->store($request);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.company.company-edit', [
            'company' => $company,
            'cities' => City::all(),
            'states' => State::all(),
            'invoice' => Invoice::select('start_date','end_date')->where('companyId', $company->id)->orderBy('id', 'desc')->first(),
            'packages' => Package::all(),
            'countries' => Country::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        try {
            $this->companyService->update($request, $company->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        try {
            $this->companyService->destroy($company->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
