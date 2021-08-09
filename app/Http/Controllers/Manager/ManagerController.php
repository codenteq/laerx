<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function getManagerDashboard() {
        return view('manager.index');
    }

    public function getManagerUserOperations() {
        return view('manager.user-operations');
    }

    public function getManagerUserResults() {
        return view('manager.user-results');
    }

    public function getManagerLiveLessons() {
        return view('manager.live-lessons');
    }

    public function getManagerTeachers() {
        return view('manager.course-teachers');
    }

    public function getManagerNotifications() {
        return view('manager.notifications');
    }

    public function getManagerSupports() {
        return view('manager.supports');
    }

    public function getManagerAppointment() {
        return view('manager.appointment');
    }

    public function getManagerUserAdd() {
        return view('manager.user-add');
    }

    public function getManagerUserList() {
        return view('manager.user-list');
    }

    public function getManagerLiveLessonAdd() {
        return view('manager.live-lessons-add');
    }

    public function getManagerTeacherAdd() {
        return view('manager.course-teachers-add');
    }

    public function getManagerCars() {
        return view('manager.cars-list');
    }

    public function getManagerCarsAdd() {
        return view('manager.cars-add');
    }

    public function getManagerAppointmentList() {
        return view('manager.appointment-list');
    }

    public function getManagerAppointmentAdd() {
        return view('manager.appointment-add');
    }
}
