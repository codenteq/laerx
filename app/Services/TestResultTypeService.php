<?php

namespace App\Services;

use App\Models\Question;
use App\Models\QuestionChoiceKey;
use App\Models\TestResultType;
use App\Models\UserAnswer;

class TestResultTypeService
{
    public function execute($userId, $testId, $resultId): void
    {
        $typeCorrects = self::typeCorrect($userId, $testId);
        $typeInCorrects = self::typeInCorrect($userId, $testId);
        $typeBlankQuestion = self::typeBlankQuestion($userId, $testId);
        $ids = self::ids($userId, $testId);

        $resultType = [];
        $i = 0;
        $types = Question::groupBy('typeId')->whereIn('id', $ids)->get();
        foreach ($types as $type) {
            array_push($resultType, array('correct' => $typeCorrects[$i]->count, 'typeId' => $typeCorrects[$i]->typeId, 'in_correct' => $typeInCorrects[$i]->count, 'blank_question' => $typeBlankQuestion));
            $i++;
        }

        foreach ($resultType as $type) {
            TestResultType::create([
                'correct' => $type['correct'],
                'in_correct' => $type['in_correct'],
                'blank_question' => $type['blank_question'],
                'testId' => $testId,
                'typeId' => $type['typeId'],
                'resultId' => $resultId,
                'userId' => $userId
            ]);
        }
    }

    /**
     * @param $userId
     * @param $testId
     * @return mixed
     */
    public function typeCorrect($userId, $testId)
    {
        $tests = UserAnswer::where('testId', $testId)->where('userId', $userId)->get();
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
        $blank = UserAnswer::where('testId', $testId)->where('userId', $userId)->whereNull('choiceId')->count();
        return $blank;
    }

    /**
     * @return array
     */
    public function ids($userId, $testId)
    {
        $tests = UserAnswer::where('testId', $testId)->where('userId', $userId)->get();
        $ids = [];
        foreach ($tests as $test) {
            array_push($ids, $test->questionId);
        }

        return $ids;
    }
}
