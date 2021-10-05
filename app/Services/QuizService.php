<?php

namespace App\Services;

use App\Http\Constants\NormalExam;
use App\Jobs\TestResultJob;
use App\Models\BugQuestion;
use App\Models\ClassExamQuestionType;
use App\Models\Question;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\UserAnswer;
use App\Services\TestResult\TestResultService;
use Illuminate\Support\Arr;

class QuizService
{
    protected $testResultService;

    public function __construct(TestResultService $testResultService)
    {
        $this->testResultService = $testResultService;
    }

    /**
     * @param $questions
     */
    public function testStore($questions)
    {
        $test = Test::create(['title' => rand(),'userId' => auth()->id()]);
        foreach ($questions as $question) {
            TestQuestion::create([
                'questionId' => $question->id,
                'testId' => $test->id,
            ]);
        }
    }

    /**
     * @param $request
     */
    public function userAnswerStore($request): void
    {
        foreach ($request->userAnswerKeys as $key => $val) {
            UserAnswer::create([
                'testId' => $request->testId,
                'userId' => $request->userId,
                'questionId' => $val['questionId'],
                'choiceId' => $val['choiceId']
            ]);
        }
        //TestResultJob::dispatch($request->userId ,$request->testId)->onQueue('result');
        $this->testResultService->execute($request->userId ,$request->testId);
    }

    /**
     * @param $classId
     * @return array
     */
    public function classExamQuestion($classId): array
    {
        $arr = [];
        $questions = ClassExamQuestionType::where('classExamId',$classId)->get();
        foreach ($questions as $question) {
            array_push($arr, Question::where('typeId', $question->typeId)->with('choice','types')->take($question->length)->get());
        }

        return Arr::collapse($arr);
    }


    public function customExam(): array
    {
        $arr = [];
        $types = session('custom_exam_setting');
        foreach ($types as $key => $val) {
            array_push($arr, Question::where('typeId', $key)->where('languageId',languageId())->with('choice','types')->inRandomOrder()->take($val)->get());
        }

        return Arr::collapse($arr);
    }

    public function normalExam(): array
    {
        $arr = [];
        $types = NormalExam::QUIZ_EXAM_TYPE;
        foreach ($types as $key => $val) {
            array_push($arr, Question::where('typeId', $key)->where('languageId',languageId())->with('choice','types')->inRandomOrder()->take($val)->get());
        }

        return Arr::collapse($arr);
    }

    /**
     * @param $questions
     */
    public function bugQuestionStore($request)
    {
        BugQuestion::create([
            'questionId' => $request->questionId,
        ]);
    }
}
