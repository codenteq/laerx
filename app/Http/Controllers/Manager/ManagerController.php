<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\CompanyRequest;
use App\Http\Requests\Manager\ProfileRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Invoice;
use App\Models\Language;
use App\Models\PaymentMethod;
use App\Models\State;
use App\Models\UserInfo;
use App\Services\GlobalService;
use App\Services\Manager\CompanyService;

class ManagerController extends Controller
{
    public function getManagerDashboard()
    {
        $invoice = null;
        if (session('invoice')) {
            $invoice = Invoice::where('companyId', companyId())->orderBy('id', 'desc')->first();
            $data = [
                'price' => $invoice->price,
                'total_amount' => $invoice->price,
                'discount' => 0,
                'couponId' => null
            ];
            session(['cart' => $data]);
        }

        $payment_methods = session('invoice') ? PaymentMethod::where('status', 1)->get() : null;
        return view('manager.index', compact('payment_methods', 'invoice'));
    }

    public function getProfile()
    {
        $languages = Language::all();
        $user = UserInfo::where('userId',auth()->id())->with(['user','language'])->firstOrFail();
        return view('manager.profile',compact('user','languages'));
    }

    public function updateProfile(ProfileRequest $request, GlobalService $globalService)
    {
        try {
            $globalService->userUpdate($request,auth()->id());
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    public function getCompany()
    {
        return view('manager.company', [
            'company' => Company::find(companyId()),
            'cities' => City::all(),
            'states' => State::all(),
            'countries' => Country::all()
        ]);
    }

    public function updateCompany(CompanyRequest $request, CompanyService $companyService)
    {
        try {
            $companyService->update($request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
