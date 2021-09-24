<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\AppointmentRequest;
use App\Models\Appointment;
use App\Models\AppointmentSetting;
use App\Models\Car;
use App\Models\User;
use App\Services\Manager\AppointmentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private $appointmentService;

    public function __construct(AppointmentService $apppointmentService)
    {
        $this->appointmentService = $apppointmentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::where('companyId', companyId())
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
            'users' => User::where('type', User::Normal)->whereRelation('info','companyId',companyId())->get(),
            'teachers' => User::where('type', User::Teacher)->get(),
            'cars' => Car::where('status', 1)->where('companyId',companyId())->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Manager\AppointmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        try {
            if (!ignoreDateCheck($request->date)) {
                $this->appointmentService->store($request);
                return response(ResponseMessage::SuccessMessage());
            } else {
                return response(ResponseMessage::IgnoreDateMessage());
            }
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
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
            'users' => User::where('type', User::Normal)->whereRelation('info','companyId',companyId())->get(),
            'teachers' => User::where('type', User::Teacher)->get(),
            'cars' => Car::where('status', 1)->where('companyId',companyId())->get(),
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
            if (!ignoreDateCheck($request->date)) {
                $this->appointmentService->update($request, $appointment->id);
                return response(ResponseMessage::SuccessMessage());
            } else {
                return response(ResponseMessage::IgnoreDateMessage());
            }
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
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
            $this->appointmentService->destroy($appointment->id);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    public function getManagerAppointment()
    {
        return view('manager.appointment.appointment');
    }

    public function getAppointmentSetting()
    {
        $months = currentMounth();
        return view('manager.appointment.appointment-setting', compact('months'));
    }

    public function postAppointmentSetting(Request $request)
    {
        try {
            $this->appointmentService->settingStoreAndUpdate($request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}

