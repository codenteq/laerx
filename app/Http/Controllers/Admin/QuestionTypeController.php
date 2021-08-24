<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionTypeRequest;
use App\Models\QuestionType;
use App\Services\Admin\QuestionTypeService;
use Illuminate\Http\Request;

class QuestionTypeController extends Controller
{
    private $questionTypeService;

    public function __construct(QuestionTypeService $questionTypeService)
    {
        $this->questionTypeService = $questionTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = QuestionType::latest()->get();
        return view('admin.question-type.question-type',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question-type.question-type-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\QuestionTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionTypeRequest $request)
    {
        try {
            $this->questionTypeService->store($request);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionType  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionType $type)
    {
        return view('admin.question-type.question-type-edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\QuestionTypeRequest  $request
     * @param  \App\Models\QuestionType  $type
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionTypeRequest $request, QuestionType $type)
    {
        try {
            $this->questionTypeService->update($request,$type->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionType  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionType $type)
    {
        try {
            $this->questionTypeService->destroy($type->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
