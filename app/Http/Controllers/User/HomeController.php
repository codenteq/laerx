<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getDashboard() {
        return view('user.index');
    }

    public function getLessons() {
        return view('user.lessons');
    }

    public function getExams() {
        return view('user.exams');
    }

    public function getClassExams() {
        return view('user.class-exams');
    }

    public function getResults() {
        return view('user.results');
    }

    public function getAppointment() {
        return view('user.appointment');
    }

    public function getLiveLessons() {
        return view('user.live-lessons');
    }

    public function getProfile() {
        return view('user.profile');
    }

    public function getSupport() {
        return view('user.support');
    }

    public function getNotifications() {
        return view('user.notifications');
    }
}
