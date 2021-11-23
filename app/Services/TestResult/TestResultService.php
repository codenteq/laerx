<?php

namespace App\Services\TestResult;

use App\Models\QuestionChoiceKey;
use App\Models\TestResult;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        DB::transaction(function () use ($userId, $testId) {
            $userAnswers = UserAnswer::where('userId', $userId)->where('testId', $testId)->get();

            $point = self::point($userAnswers);
            $correct = self::correct($userAnswers);
            $inCorrect = self::inCorrect($userAnswers);
            $blankQuestion = self::blankQuestion($userAnswers);

            $result = TestResult::create([
                'total_question' => $correct + $inCorrect + $blankQuestion,
                'point' => $point,
                'correct' => $correct,
                'in_correct' => $inCorrect,
                'blank_question' => $blankQuestion,
                'testId' => $testId,
                'userId' => $userId
            ]);

            $this->testResultTypeService->execute($userId, $testId, $result->id, $userAnswers);
        });
    }


    /**
     * @param $userAnswers
     * @return int
     */
    public function point($userAnswers): int
    {
        $point = 0;
        foreach ($userAnswers as $answer) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId', $answer->questionId)->where('choiceId', $answer->choiceId)->first();
            $choiceKey == true ? $point++ : null;
        }
        return round(100 / $userAnswers->count() * $point, 2);
    }


    /**
     * @param $userAnswers
     * @return int
     */
    public function correct($userAnswers): int
    {
        $correct = 0;
        foreach ($userAnswers as $answers) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId', $answers->questionId)->where('choiceId', $answers->choiceId)->first();
            $choiceKey == true ? $correct++ : null;
        }
        return $correct;
    }

    /**
     * @param $userAnswers
     * @return int
     */
    public function inCorrect($userAnswers): int
    {
        $in_correct = 0;
        foreach ($userAnswers as $answer) {
            if ($answer->choiceId != null) {
                $choiceKey = (bool)QuestionChoiceKey::where('questionId', $answer->questionId)->where('choiceId', $answer->choiceId)->first();
                $choiceKey !== true ? $in_correct++ : null;
            }
        }
        return $in_correct;
    }

    /**
     * @param $userAnswers
     * @return int
     */
    public function blankQuestion($userAnswers): int
    {
        return $userAnswers->whereNull('choiceId')->count();
    }
}
