<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Services\QuizService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuizController extends Controller
{
    protected $quizService;

    public function __construct(QuizService $quizService)
    {
        $this->quizService = $quizService;
    }

    public function getNormalExam()
    {
        return view('user.quiz');
    }

    public function getCustomExam()
    {
        return view('user.quiz');
    }

    public function getClassExam()
    {
        session(['class_exam' => request()->get('class')]);
        return view('user.quiz');
    }

    public function fetchNormalExam(): AnonymousResourceCollection
    {
        $questions = $this->quizService->normalExam();
        $this->quizService->testStore($questions);
        return QuestionResource::collection($questions);
    }

    public function fetchCustomExam(): AnonymousResourceCollection
    {
        $questions = $this->quizService->customExam();
        $this->quizService->testStore($questions);
        return QuestionResource::collection($questions);
    }

    public function fetchClassExam(): AnonymousResourceCollection
    {
        $questions = $this->quizService->classExamQuestion(session('class_exam'));
        $this->quizService->testStore($questions);
        return QuestionResource::collection($questions);
    }

    public function fetchUserAndTest(): JsonResponse
    {
        $test = Test::select('id')->where('userId',auth()->id())->latest()->first();
        $data = [
            'user' => [
                'id' => auth()->id(),
                'name_surname' => auth()->user()->name . ' ' . auth()->user()->surname,
                'email' => auth()->user()->email
            ],
            'test' => $test->id
        ];
        return response()->json($data);
    }

    public function postUserAnswer(QuizService $questionService, Request $request): JsonResponse
    {
        $questionService->userAnswerStore($request);
        return response()->json('success');
    }

    // TODO: code refactor
    public function postCloseExam(Request $request): JsonResponse
    {
        Test::find($request->testId)->delete();
        TestQuestion::where('testId',$request->testId)->delete();
        return response()->json('success');
    }
}
