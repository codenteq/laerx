<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\CourseTeacherRequest;
use App\Models\Language;
use App\Models\User;
use App\Models\UserInfo;
use App\Services\GlobalService;

class CourseTeacherController extends Controller
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
        $users = UserInfo::where('companyId', companyId())->whereRelation('user', 'type', User::Teacher)->with('user')->latest()->get();

        return view('manager.teachers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();

        return view('manager.teachers.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CourseTeacherRequest $request)
    {
        try {
            $this->globalService->userStore($request, User::Teacher);

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
    public function edit(User $course_teacher)
    {
        $languages = Language::all();
        $user = UserInfo::where('userId', $course_teacher->id)->with('user')->first();

        return view('manager.teachers.edit', compact('user', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CourseTeacherRequest $request, User $course_teacher)
    {
        try {
            $this->globalService->userUpdate($request, $course_teacher->id);

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
    public function destroy(User $course_teacher)
    {
        try {
            $this->globalService->userDestroy($course_teacher->id);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
