<?php

namespace App\Http\Controllers\Manager;

use App\Helpers\Helper;
use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\AppointmentRequest;
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
        $appointments = Appointment::where('companyId', Helper::companyId())
            ->with('user', 'teacher', 'car')
            ->latest()
            ->get();
        return view('manager.appointment.appointment-list', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.appointment.appointment-add', [
            'users' => User::where('type', 3)->get(),
            'teachers' => User::where('type', 2)->get(),
            'cars' => Car::where('status', 1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Manager\AppointmentRequest $request
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function store(Appointment $appointment, AppointmentRequest $request)
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
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('manager.appointment.appointment-edit', [
            'users' => User::where('type', 3)->get(),
            'teachers' => User::where('type', 2)->get(),
            'cars' => Car::where('status', 1)->get(),
            'appointment' => $appointment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Manager\AppointmentRequest $request
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        try {
            if (!Helper::ignoreDateCheck($request->date)) {
                $appointment->update($request->all());
                return response(ResponseMessage::SuccessMessage);
            } else {
                return response(ResponseMessage::IgnoreDateMessage);
            }
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        try {
            $appointment->delete();
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    public function getManagerAppointment()
    {
        return view('manager.appointment.appointment');
    }
}

