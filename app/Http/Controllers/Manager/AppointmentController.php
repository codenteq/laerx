<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Car;
use App\Models\User;
use App\Services\Manager\AppointmentService;
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

        return view('manager.appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.appointment.create', [
            'users' => User::where('type', User::Normal)->whereRelation('info', 'companyId', companyId())->get(),
            'teachers' => User::where('type', User::Teacher)->whereRelation('info', 'companyId', companyId())->get(),
            'cars' => Car::where('status', 1)->where('companyId', companyId())->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        try {
            if (! ignoreDateCheck($request->date)) {
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('manager.appointment.edit', [
            'users' => User::where('type', User::Normal)->whereRelation('info', 'companyId', companyId())->get(),
            'teachers' => User::where('type', User::Teacher)->get(),
            'cars' => Car::where('status', 1)->where('companyId', companyId())->get(),
            'appointment' => $appointment,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        try {
            if (! ignoreDateCheck($request->date)) {
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

    public function getAppointmentSetting()
    {
        $months = currentMounth();

        return view('manager.appointment.setting', compact('months'));
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
