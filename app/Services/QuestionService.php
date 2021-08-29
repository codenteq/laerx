<?php

namespace App\Services;

use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\UserAnswer;

class QuestionService
{
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
    }
}
