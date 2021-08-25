<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Language;
use App\Models\Month;
use App\Models\Period;
use App\Models\User;
use App\Models\UserInfo;
use App\Services\GlobalService;
use Illuminate\Http\Request;
use App\Http\Requests\Manager\UserRequest;

class UserController extends Controller
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
        $users = UserInfo::where('companyId', companyId())->with('company', 'user', 'language', 'period', 'month')->latest()->get();
        return view('manager.users.user-list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.users.user-add', [
            'periods' => Period::all(),
            'groups' => Group::all(),
            'languages' => Language::all(),
            'months' => Month::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Manager\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $this->globalService->userStore($request, User::Normal);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('manager.users.user-edit', [
            'periods' => Period::all(),
            'groups' => Group::all(),
            'languages' => Language::all(),
            'months' => Month::all(),
            'user' => UserInfo::where('userId', $user->id)->with('company', 'user', 'language', 'period')->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Manager\UserRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            $this->globalService->userUpdate($request, $user->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $this->globalService->userDestroy($user->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    public function getManagerUserOperations()
    {
        return view('manager.users.user-operations');
    }

    public function getManagerUserResults()
    {
        return view('manager.users.user-results');
    }
}
