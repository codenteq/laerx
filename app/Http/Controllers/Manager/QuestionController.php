<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\QuestionRequest;
use App\Models\Question;
use App\Models\QuestionType;
use App\Services\Manager\QuestionService;

class QuestionController extends Controller
{
    private $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

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
            $this->questionService->questionUpdate($question->id, $request->all());
            $request->choiceImage == "on" ? $this->questionService->questionChoiceImageUpdate()
                : $this->questionService->questionChoiceUpdate($request->except(['_token', '_method', 'typeId', 'correct_choice', 'title', 'choiceImage','questionImage']));
            $this->questionService->questionChoiceKeyUpdate($question->id,$request->only(['correct_choice']));
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
        try {
            $question->delete();
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
