<?php

namespace App\Services\TestResult;

use App\Models\Question;
use App\Models\QuestionChoiceKey;
use App\Models\TestResultType;
use Illuminate\Support\Facades\Log;

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
            array_push($resultType, array('correct' => $typeCorrects[$i]->count ?? 0, 'typeId' => $type->typeId, 'in_correct' => $typeInCorrects[$i]->count ?? 0, 'blank_question' => isset($typeBlankQuestion[$i]) ? $typeBlankQuestion[$i]->count : 0));
            $i++;
        }

        foreach ($resultType as $type) {
            TestResultType::create([
                'total_question' => $type['correct'] + $type['in_correct'] + $type['blank_question'],
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
            if ($answer->choiceId != null) {
                $choiceKey = QuestionChoiceKey::where('questionId', $answer->questionId)->where('choiceId', $answer->choiceId)->first();
                if (is_null($choiceKey?->questionId)) {
                    array_push($questionIds, $answer->questionId);
                }
            }
        }
        return Question::selectRaw('*, count(*) as count')->groupBy('typeId')->whereIn('id', $questionIds)->get();
    }


    /**
     * @param $userAnswers
     */
    public function typeBlankQuestion($userAnswers)
    {
        $questionIds = [];
        foreach ($userAnswers->whereNull('choiceId') as $answer) {
            array_push($questionIds, $answer->questionId);
        }
        return Question::selectRaw('*, count(*) as count')->groupBy('typeId')->whereIn('id', $questionIds)->get();

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
