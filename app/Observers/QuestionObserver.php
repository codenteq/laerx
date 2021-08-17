<?php

namespace App\Observers;

use App\Helpers\Helper;
use App\Models\Question;
use App\Models\QuestionChoice;
use App\Models\QuestionChoiceKey;

class QuestionObserver
{

    private $request;

    public function __construct()
    {
        $this->request = request();
    }

    /**
     * Handle the Question "creating" event.
     *
     * @param \App\Models\Question $question
     * @return void
     */
    public function creating(Question $question)
    {
        $question->title = $this->request->title;
        $question->questionImage = isset($this->request->questionImage) === 'on' ? 1 : 0;
        $question->choiceImage = isset($this->request->choiceImage) === 'on' ? 1 : 0;
        $question->typeId = $this->request->typeId;
        $question->companyId = Helper::companyId();
    }

    /**
     * Handle the Question "created" event.
     *
     * @param \App\Models\Question $question
     * @return void
     */
    public function created(Question $question)
    {
        for ($i = 1; $i <= 4; $i++) {
            $choice = 'choice_text_' . $i;
            $answer = 'status_' . $i;
            $qChoice = QuestionChoice::create([
                'title' => $this->request->$choice,
                'path' => null,
                'questionId' => $question->id,
            ]);
            if (isset($this->request->$answer)) {
                QuestionChoiceKey::create([
                    'choiceId' => $qChoice->id,
                    'questionId' => $question->id,
                ]);
            }
        }
    }

    /**
     * Handle the Question "updating" event.
     *
     * @param \App\Models\Question $question
     * @return void
     */
    public function updating(Question $question)
    {
        $question->title = $this->request->title;
        $question->questionImage = isset($this->request->questionImage) === 'on' ? 1 : 0;
        $question->choiceImage = isset($this->request->choiceImage) === 'on' ? 1 : 0;
        $question->typeId = $this->request->typeId;

        for ($i = 1; $i <= 4; $i++) {
            $choice = 'choice_text_' . $i;
            $answer = 'status_' . $i;
            $qChoice = QuestionChoice::where()->update([
                'title' => $this->request->$choice,
                'path' => null,
                'questionId' => $question->id,
            ]);
            if (isset($this->request->$answer)) {
                QuestionChoiceKey::where('questionId',$question->id)->update([
                    'choiceId' => $qChoice->id,
                    'questionId' => $question->id,
                ]);
            }
        }
    }

    /**
     * Handle the Question "deleted" event.
     *
     * @param \App\Models\Question $question
     * @return void
     */
    public function deleted(Question $question)
    {
        //
    }

    /**
     * Handle the Question "restored" event.
     *
     * @param \App\Models\Question $question
     * @return void
     */
    public function restored(Question $question)
    {
        //
    }

    /**
     * Handle the Question "force deleted" event.
     *
     * @param \App\Models\Question $question
     * @return void
     */
    public function forceDeleted(Question $question)
    {
        //
    }
}
