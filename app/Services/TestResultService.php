<?php

namespace App\Services;

use App\Models\QuestionChoiceKey;
use App\Models\TestResult;
use App\Models\UserAnswer;

class TestResultService
{
    protected $testResultTypeService;

    public function __construct(TestResultTypeService $testResultTypeService)
    {
        $this->testResultTypeService = $testResultTypeService;
    }

    /**
     * @param $userId
     * @param $testId
     */
    public function execute($userId, $testId): void
    {
        $point = self::point($userId, $testId);
        $correct = self::correct($userId, $testId);
        $inCorrect = self::inCorrect($userId, $testId);
        $blankQuestion = self::blankQuestion($userId, $testId);

        $result = TestResult::create([
            'point' => $point,
            'correct' => $correct,
            'in_correct' => $inCorrect,
            'blank_question' => $blankQuestion,
            'testId' => $testId,
            'userId' => $userId
        ]);

        $this->testResultTypeService->execute($userId, $testId, $result->id);
    }

    /**
     * @param $userId
     * @param $testId
     * @return float
     */
    public function point($userId, $testId): float
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
    public function correct($userId, $testId): int
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
    public function inCorrect($userId, $testId): int
    {
        $tests = UserAnswer::where('testId', $testId)->where('userId', $userId)->get();
        $in_correct = 0;
        foreach ($tests as $test) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId', $test->questionId)->where('choiceId', $test->choiceId)->first();
            $choiceKey !== true ? $in_correct++ : null;
        }
        return $in_correct;
    }

    /**
     * @param $userId
     * @param $testId
     * @return int
     */
    public function blankQuestion($userId, $testId): int
    {
        $blank = UserAnswer::where('testId', $testId)->where('userId', $userId)->whereNull('choiceId')->count();
        return $blank;
    }
}
