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

    public function getManagerLiveLessons()
    {

    }

    public function getManagerNotifications()
    {
        return view('manager.notifications');
    }

    public function getManagerSupports()
    {
        return view('manager.supports');
    }
}
