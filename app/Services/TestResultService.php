<?php

namespace App\Services;

use App\Models\Question;
use App\Models\QuestionChoiceKey;
use App\Models\QuestionType;
use App\Models\TestResult;
use App\Models\TestResultType;
use App\Models\UserAnswer;

class TestResultService
{
    /**
     * @param $userId
     * @param $testId
     */
    public function execute($userId, $testId)
    {
        $point = self::point($userId, $testId);
        $correct = self::correct($userId, $testId);
        $inCorrect = self::inCorrect($userId, $testId);
        $blankQuestion = self::blankQuestion($userId, $testId);

        $typeCorrects = self::typeCorrect($userId, $testId);

        $result = TestResult::create([
            'point' => $point,
            'correct' => $correct,
            'inCorrect' => $inCorrect,
            'blankQuestion' => $blankQuestion,
            'testId' => $testId,
            'userId' => $userId
        ]);

        TestResultType::create([
            'correct' => $correct,
            'inCorrect' => $inCorrect,
            'blankQuestion' => $blankQuestion,
            'testId' => $testId,
            'typeId' => $testId,
            'resultId' => $result->id,
            'userId' => $userId
        ]);

    }

    /**
     * @param $userId
     * @param $testId
     * @return float
     */
    public function point($userId, $testId)
    {
        $tests = UserAnswer::where('testId', $testId)->where('userId', $userId)->get();
        $point = 0;
        foreach ($tests as $test) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId', $test->questionId)->where('choiceId', $test->choiceId)->first();
            $choiceKey === true ? $point++ : null;
        }
        return round(100 / $tests->count() * $point, 2);
    }

    /**
     * @param $userId
     * @param $testId
     * @return int
     */
    public function correct($userId, $testId)
    {
        $tests = UserAnswer::where('testId', $testId)->where('userId', $userId)->get();
        $correct = 0;
        foreach ($tests as $test) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId', $test->questionId)->where('choiceId', $test->choiceId)->first();
            $choiceKey === true ? $correct++ : null;
        }
        return $correct;
    }

    /**
     * @param $userId
     * @param $testId
     * @return int
     */
    public function inCorrect($userId, $testId)
    {
        $tests = UserAnswer::where('testId', $testId)->where('userId', $userId)->get();
        $in_correct = 0;
        foreach ($tests as $test) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId', $test->questionId)->where('choiceId', $test->choiceId)->first();
            $choiceKey === false ? $in_correct++ : null;
        }
        return $in_correct;
    }

    /**
     * @param $userId
     * @param $testId
     * @return int
     */
    public function blankQuestion($userId, $testId)
    {
        $tests = UserAnswer::where('testId', $testId)->where('userId', $userId)->get();
        $in_correct = 0;
        foreach ($tests as $test) {
            $test->choiceId != null ? $in_correct++ : null;
        }
        return $in_correct;
    }

    /**
     * @param $userId
     * @param $testId
     * @return mixed
     */
    public function typeCorrect($userId, $testId)
    {
        $tests = UserAnswer::where('testId', 17)->where('userId', 3)->get();
        $questionIds = [];
        foreach ($tests as $test) {
            $choiceKey = QuestionChoiceKey::where('questionId', $test->questionId)->where('choiceId', $test->choiceId)->first();
            if (!is_null($choiceKey?->questionId)) {
                array_push($questionIds, $choiceKey->questionId);
            }
        }
        $typeCorrects = Question::selectRaw('*, count(*) as count')->groupBy('typeId')->whereIn('id', $questionIds)->get();
        return $typeCorrects;
    }

    /**
     * @param $userId
     * @param $testId
     * @return mixed
     */
    public function typeInCorrect($userId, $testId)
    {
        $tests = UserAnswer::where('testId', $testId)->where('userId', $userId)->get();
        $questionIds = [];
        foreach ($tests as $test) {
            $choiceKey = QuestionChoiceKey::where('questionId', $test->questionId)->where('choiceId', $test->choiceId)->first();
            if (is_null($choiceKey?->questionId)) {
                array_push($questionIds, $test->questionId);
            }
        }
        $typeInCorrects = Question::selectRaw('*, count(*) as count')->groupBy('typeId')->whereIn('id', $questionIds)->get();
        return $typeInCorrects;
    }

    /**
     * @param $userId
     * @param $testId
     * @return int
     */
    public function typeBlankQuestion($userId, $testId)
    {
        $tests = UserAnswer::where('testId', $testId)->where('userId', $userId)->get();
        $in_correct = 0;
        foreach ($tests as $test) {
            $test->choiceId != null ? $in_correct++ : null;
        }
        return $in_correct;
    }
}
