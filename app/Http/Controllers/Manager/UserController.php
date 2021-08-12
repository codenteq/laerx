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
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserInfo::where('companyId',auth()->user()->info->companyId)->with('company', 'user', 'language','period','month')->get();
        return view('manager.users.user-list',compact('users'));
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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        try {
            $user->create([
                'type' => User::Normal,
                'companyId' => 1
            ]);
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
        return view('manager.users.user-edit',[
            'periods' => Period::all(),
            'groups' => Group::all(),
            'languages' => Language::all(),
            'months' => Month::all(),
            'user' => UserInfo::where('userId', $user->id)->with('company', 'user', 'language','period')->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $user->update($request->all());
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
            $user->delete();
            UserInfo::where('userId', $user->id)->delete();
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
