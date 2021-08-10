<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAdminDashboard() {
        return view('admin.index');
    }

    public function getAdminLanguage() {
        return view('admin.language.language');
    }

    public function getAdminLanguageAdd() {
        return view('admin.language.language-add');
    }

    public function getAdminGroup() {
        return view('admin.group.group');
    }

    public function getAdminGroupAdd() {
        return view('admin.group.group-add');
    }

    public function getAdminPeriod() {
        return view('admin.period.period');
    }

    public function getAdminPeriodAdd() {
        return view('admin.period.period-add');
    }

    public function getAdminUsersAdd() {
        return view('admin.users.users-add');
    }

    public function getAdminUsers() {
        return view('admin.users.users');
    }
}
