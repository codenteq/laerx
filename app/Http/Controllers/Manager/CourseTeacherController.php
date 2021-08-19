<?php

namespace App\Http\Controllers\Manager;

use App\Helpers\Helper;
use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\CourseTeacherRequest;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class CourseTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserInfo::where('companyId', Helper::companyId())->with('user')->get();
        return view('manager.course.course-teachers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.course.course-teacher-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Manager\CourseTeacherRequest $request
     * @param \App\Models\User $course_teacher
     * @return \Illuminate\Http\Response
     */
    public function store(User $course_teacher, CourseTeacherRequest $request)
    {
        try {
            $course_teacher->create([
                'type' => User::Manager,
            ]);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Models\User $course_teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $course_teacher)
    {
        $user = UserInfo::where('userId',$course_teacher->id)->with('user')->first();
        return view('manager.course.course-teacher-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Manager\CourseTeacherRequest $request
     * @param \App\Models\User $course_teacher
     * @return \Illuminate\Http\Response
     */
    public function update(CourseTeacherRequest $request, User $course_teacher)
    {
        try {
            $course_teacher->update($request->all());
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $course_teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $course_teacher)
    {
        try {
            $course_teacher->delete();
            UserInfo::where('userId',$course_teacher->id)->delete();
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
