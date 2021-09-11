<?php

namespace App\Services;

use App\Jobs\TestResultJob;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\UserAnswer;

class QuizService
{
    public function testStore($questions)
    {
        $test = Test::create(['title' => rand(),'userId' => 3]);
        foreach ($questions as $question) {
            TestQuestion::create([
                'questionId' => $question->id,
                'testId' => $test->id,
            ]);
        }
    }

    public function userAnswerStore($request)
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
}
