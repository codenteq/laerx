<?php

namespace App\Services;

use App\Models\Question;
use App\Models\QuestionChoiceKey;
use App\Models\TestResultType;

class TestResultTypeService
{
    /**
     * @param $userId
     * @param $testId
     * @param $resultId
     * @param $userAnswers
     */
    public function execute($userId, $testId, $resultId, $userAnswers): void
    {
        $typeCorrects = self::typeCorrect($userAnswers);
        $typeInCorrects = self::typeInCorrect($userAnswers);
        $typeBlankQuestion = self::typeBlankQuestion($userAnswers);
        $ids = self::ids($userAnswers);

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
     * @param $userAnswers
     */
    public function typeCorrect($userAnswers)
    {
        $questionIds = [];
        foreach ($userAnswers as $answer) {
            $choiceKey = QuestionChoiceKey::where('questionId', $answer->questionId)->where('choiceId', $answer->choiceId)->first();
            if (!is_null($choiceKey?->questionId)) {
                array_push($questionIds, $choiceKey->questionId);
            }
        }
        return Question::selectRaw('*, count(*) as count')->groupBy('typeId')->whereIn('id', $questionIds)->get();
    }


    /**
     * @param $userAnswers
     */
    public function typeInCorrect($userAnswers)
    {
        $questionIds = [];
        foreach ($userAnswers as $answer) {
            $choiceKey = QuestionChoiceKey::where('questionId', $answer->questionId)->where('choiceId', $answer->choiceId)->first();
            if (is_null($choiceKey?->questionId)) {
                array_push($questionIds, $answer->questionId);
            }
        }
        return Question::selectRaw('*, count(*) as count')->groupBy('typeId')->whereIn('id', $questionIds)->get();
    }


    /**
     * @param $userAnswers
     * @return int
     */
    public function typeBlankQuestion($userAnswers): int
    {
        return $userAnswers->whereNull('choiceId')->count();
    }


    /**
     * @param $userAnswers
     * @return array
     */
    public function ids($userAnswers): array
    {
        $ids = [];
        foreach ($userAnswers as $answer) {
            array_push($ids, $answer->questionId);
        }
        return $ids;
    }
}
