<?php

namespace App\Http\Controllers\User;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Car;
use App\Models\User;
use App\Services\User\AppointmentService;
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
            'appointments' => Appointment::where('userId', auth()->id())->where('companyId', companyId())->with('user')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param AppointmentService $appointmentService
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentService $appointmentService, Request $request)
    {
        try {
            if (!ignoreDateCheck($request->date)) {
                $appointmentService->store($request);
                return response(ResponseMessage::SuccessMessage);
            } else {
                return response(ResponseMessage::IgnoreDateMessage);
            }
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
