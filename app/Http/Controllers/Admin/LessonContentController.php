<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LessonContentRequest;
use App\Models\Language;
use App\Models\LessonContent;
use App\Models\QuestionType;
use App\Services\Admin\LessonContentService;

class LessonContentController extends Controller
{
    private $lessonContentService;

    public function __construct(LessonContentService $lessonContentService)
    {
        $this->lessonContentService = $lessonContentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = LessonContent::latest()->get();
        return view('admin.lesson-content.lesson',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        $types = QuestionType::all();
        return view('admin.lesson-content.lesson-add',compact('languages','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\LessonContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonContentRequest $request)
    {
        try {
            $this->lessonContentService->store($request);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LessonContent  $lessonContent
     * @return \Illuminate\Http\Response
     */
    public function show(LessonContent $lessonContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LessonContent  $lessonContent
     * @return \Illuminate\Http\Response
     */
    public function edit(LessonContent $lessonContent)
    {
        $languages = Language::all();
        $types = QuestionType::all();
        return view('admin.lesson-content.lesson-edit',compact('lessonContent','languages','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\LessonContentRequest  $request
     * @param  \App\Models\LessonContent  $lessonContent
     * @return \Illuminate\Http\Response
     */
    public function update(LessonContentRequest $request, LessonContent $lessonContent)
    {
        try {
            $this->lessonContentService->update($request,$lessonContent->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LessonContent  $lessonContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(LessonContent $lessonContent)
    {
        try {
            $this->lessonContentService->destroy($lessonContent->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
