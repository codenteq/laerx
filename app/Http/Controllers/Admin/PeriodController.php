<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PeriodRequest;
use App\Models\Period;
use App\Services\Admin\PeriodService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PeriodController extends Controller
{
    private $periodService;

    public function __construct(PeriodService $periodService)
    {
        $this->periodService = $periodService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::all();
        return view('admin.period.period',compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.period.period-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PeriodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeriodRequest $request)
    {
        try {
            $this->periodService->store($request);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('admin.period.period-edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PeriodRequest  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(PeriodRequest $request, Period $period)
    {
        try {
            $this->periodService->update($request,$period->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        try {
            $this->periodService->destroy($period->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
