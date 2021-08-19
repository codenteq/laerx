<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.appointments.appointment',[
            'teachers' => User::where('type', 2)->get(),
            'cars' => Car::where('status', 1)->get(),
            'appointments' => Appointment::where('userId', auth()->id())->where('companyId', Helper::companyId())->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function store(Appointment $appointment, Request $request)
    {
        try {
            if (!Helper::ignoreDateCheck($request->date)) {
                $appointment->create($request->all());
                return response(ResponseMessage::SuccessMessage);
            } else {
                return response(ResponseMessage::IgnoreDateMessage);
            }
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
