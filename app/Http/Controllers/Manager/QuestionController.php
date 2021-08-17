<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\QuestionRequest;
use App\Models\Question;
use App\Models\QuestionType;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->get();
        return view('manager.question.question',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = QuestionType::all();
        return view('manager.question.question-add', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Manager\QuestionRequest $request
     * @param \App\Models\Question $question
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, QuestionRequest $request)
    {
        try {
            $question->create($request->all());
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $types = QuestionType::all();
        return view('manager.question.question-edit',compact('question','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Manager\QuestionRequest $request
     * @param \App\Models\Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        try {
            $question->update($request->all());
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Question $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
