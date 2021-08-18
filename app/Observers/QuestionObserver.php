<?php

namespace App\Observers;

use App\Helpers\Helper;
use App\Models\Question;
use App\Models\QuestionChoice;
use App\Models\QuestionChoiceKey;
use Illuminate\Support\Facades\Log;

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
        isset($this->request->questionImage) ? $path = $this->request->file('imagePath')->store('public/questions') : $path = null;
        $question->imagePath = $path;
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
            $choiceImage = 'choice_image_' . $i;
            $answer = 'status_' . $i;
            isset($this->request->choiceImage) ? $path = $this->request->file($choiceImage)->store('public/choices') : $path = null;
            $qChoice = QuestionChoice::create([
                'title' => $this->request->$choice,
                'path' => $path,
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

        $req = $this->request->except(['_token', '_method', 'typeId', 'correct_choice', 'title']);
        foreach ($req as $key => $val) {
            QuestionChoice::find($key)->update([
                'title' => $val,
                'path' => null,
                'questionId' => $question->id,
            ]);
        }

        QuestionChoiceKey::where('questionId',$question->id)->update([
            'choiceId' =>   $this->request->correct_choice,
            'questionId' => $question->id,
        ]);
    }

    /**
     * Handle the Question "deleted" event.
     *
     * @param \App\Models\Question $question
     * @return void
     */
    public function deleted(Question $question)
    {
        QuestionChoice::where('questionId', $question->id)->delete();
        QuestionChoiceKey::where('questionId', $question->id)->delete();
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
