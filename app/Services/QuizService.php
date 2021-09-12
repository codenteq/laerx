<?php

namespace App\Services;

use App\Jobs\TestResultJob;
use App\Models\ClassExamQuestionType;
use App\Models\Question;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\UserAnswer;
use Illuminate\Support\Arr;

class QuizService
{
    /**
     * @param $questions
     */
    public function testStore($questions): void
    {
        $test = Test::create(['title' => rand(),'userId' => 3]);
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
        TestResultJob::dispatch($request->userId ,$request->testId)->onQueue('result');
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
            array_push($arr, Question::where('typeId', $question->typeId)->with('choice')->take($question->length)->get());
        }

        return Arr::collapse($arr);
    }


    public function customExam($request)
    {
        //
    }



    public function normalExam($request)
    {
        //
    }
}
