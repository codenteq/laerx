<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManagerUserRequest;
use App\Models\Company;
use App\Models\Language;
use App\Models\User;
use App\Models\UserInfo;
use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManagerUserController extends Controller
{
    private $globalService;

    public function __construct(GlobalService $globalService)
    {
        $this->globalService = $globalService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserInfo::with('company', 'user', 'language')->latest()->get();
        return view('admin.users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::with('companies')->latest()->get();
        $languages = Language::all();
        return view('admin.users.user-add', compact('companies', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerUserRequest $request)
    {
        try {
            $this->globalService->userStore($request,User::Manager);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $manager_user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $manager_user)
    {
        $companies = Company::with('companies')->get();
        $languages = Language::all();
        $user = UserInfo::where('userId', $manager_user->id)->with('company', 'user', 'language')->first();
        return view('admin.users.user-edit', compact('user', 'companies', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $manager_user
     * @return \Illuminate\Http\Response
     */
    public function update(ManagerUserRequest $request, User $manager_user)
    {
        try {
            $this->globalService->userUpdate($request,$manager_user->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $manager_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $manager_user)
    {
        try {
            $this->globalService->userDestroy($manager_user->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
