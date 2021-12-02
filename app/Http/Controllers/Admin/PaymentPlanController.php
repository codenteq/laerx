<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentPlanRequest;
use App\Models\PaymentPlan;
use App\Services\Admin\PaymentPlanService;

class PaymentPlanController extends Controller
{
    private $paymentPlanService;

    public function __construct(PaymentPlanService $paymentPlanService)
    {
        $this->paymentPlanService = $paymentPlanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentPlans = PaymentPlan::latest()->get();
        return view('admin.payment-plan.payment-plan', compact('paymentPlans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment-plan.payment-plan-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PaymentPlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentPlanRequest $request)
    {
        try {
            $this->paymentPlanService->store($request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentPlan  $paymentPlan
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentPlan $paymentPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentPlan  $paymentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentPlan $paymentPlan)
    {
        return view('admin.payment-plan.payment-plan-edit', compact('paymentPlan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PaymentPlanRequest  $request
     * @param  \App\Models\PaymentPlan  $paymentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentPlanRequest $request, PaymentPlan $paymentPlan)
    {
        try {
            $this->paymentPlanService->update($paymentPlan->id, $request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentPlan  $paymentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentPlan $paymentPlan)
    {
        try {
            $this->paymentPlanService->destroy($paymentPlan->id);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
