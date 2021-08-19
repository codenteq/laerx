<?php

namespace App\Http\Controllers\Manager;

use App\Helpers\Helper;
use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\LiveLessonRequest;
use App\Models\Group;
use App\Models\LiveLesson;
use App\Models\Month;
use App\Models\Period;
use App\Models\QuestionType;
use Illuminate\Http\Request;

class LiveLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $live_lessons = LiveLesson::with('type')->latest()->get();
        return view('manager.live.live-lessons', compact('live_lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.live.live-lessons-add', [
            'months' => Month::all(),
            'periods' => Period::all(),
            'groups' => Group::all(),
            'types' => QuestionType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Manager\LiveLessonRequest $request
     * @param \App\Models\LiveLesson $live_lesson
     * @return \Illuminate\Http\Response
     */
    public function store(LiveLesson $live_lesson, LiveLessonRequest $request)
    {
        try {
            $request->merge(['companyId' => Helper::companyId()]);
            $live_lesson->create($request->all());
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\LiveLesson $live_lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(LiveLesson $live_lesson)
    {
        return view('manager.live.live-lesson-edit', [
            'months' => Month::all(),
            'periods' => Period::all(),
            'groups' => Group::all(),
            'types' => QuestionType::all(),
            'live_lesson' => $live_lesson,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Manager\LiveLessonRequest $request
     * @param \App\Models\LiveLesson $live_lesson
     * @return \Illuminate\Http\Response
     */
    public function update(LiveLessonRequest $request, LiveLesson $live_lesson)
    {
        try {
            $live_lesson->update($request->all());
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\LiveLesson $live_lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(LiveLesson $live_lesson)
    {
        try {
            $live_lesson->delete();
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
