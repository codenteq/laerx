<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Services\QuizService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuizController extends Controller
{
    protected $quizService;

    public function __construct(QuizService $quizService)
    {
        $this->quizService = $quizService;
    }

    public function getNormalExam(): AnonymousResourceCollection
    {
        $questions = $this->quizService->normalExam();
        $this->quizService->testStore($questions);
        return QuestionResource::collection($questions);
    }

    public function getCustomExam()
    {
        return 'CustomExam';
    }

    public function getClassExam(): AnonymousResourceCollection
    {
        $questions = $this->quizService->customExam();
        $this->quizService->testStore($questions);
        return QuestionResource::collection($questions);
    }
}
