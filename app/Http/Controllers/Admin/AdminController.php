<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\GlobalService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAdminDashboard()
    {
        return view('admin.index');
    }

    public function getSettingDashboard()
    {
        return view('admin.setting-dashboard');
    }

    public function getProfile()
    {
        $user = User::find(auth()->id());
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request, GlobalService $globalService)
    {
        try {
            $globalService->userUpdate($request, auth()->id());
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
