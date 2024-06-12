<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\QuestionRequest;
use App\Models\BugQuestion;
use App\Models\CompanyQuestion;
use App\Models\Language;
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
        $questions = CompanyQuestion::where('companyId', companyId())->with('question.language')->orderByDesc('questionId')->get();

        return view('manager.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = QuestionType::all();
        $languages = Language::all();

        return view('manager.question.create', compact('types', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        try {
            $this->questionService->store($request);

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
    public function edit(Question $question)
    {
        $types = QuestionType::all();
        $languages = Language::all();

        return view('manager.question.edit', compact('question', 'types', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        try {
            $this->questionService->update($request, $question->id);

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
    public function destroy(Question $question)
    {
        try {
            $this->questionService->destroy($question->id);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    public function getQuestionBug()
    {
        $questions = BugQuestion::with('question')->whereRelation('companyQuestion', 'companyId', companyId())->get();

        return view('manager.question.bug', compact('questions'));
    }

    public function destroyQuestionBug($bugId)
    {
        try {
            $this->questionService->bugDestroy($bugId);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
