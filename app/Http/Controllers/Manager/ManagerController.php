<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function getManagerDashboard()
    {
        return view('manager.index');
    }

    public function getManagerAppointmentSetting()
    {
        return view('manager.appointment.appointment-setting');
    }
}
