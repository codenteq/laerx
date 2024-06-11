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
        $users = UserInfo::with('company', 'user', 'language')->whereRelation('user', 'type', User::Manager)->latest()->get();

        return view('admin.users.index', compact('users'));
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

        return view('admin.users.create', compact('companies', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerUserRequest $request)
    {
        try {
            $this->globalService->userStore($request, User::Manager);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $manager_user)
    {
        $companies = Company::with('companies')->get();
        $languages = Language::all();
        $user = UserInfo::where('userId', $manager_user->id)->with('company', 'user', 'language')->first();

        return view('admin.users.edit', compact('user', 'companies', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ManagerUserRequest $request, User $manager_user)
    {
        try {
            $this->globalService->userUpdate($request, $manager_user->id);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $manager_user)
    {
        try {
            $this->globalService->userDestroy($manager_user->id);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
