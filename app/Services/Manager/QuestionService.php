<?php

namespace App\Services\Manager;

use App\Models\Question;
use App\Models\QuestionChoice;
use App\Models\QuestionChoiceKey;
use Illuminate\Support\Facades\Log;

class QuestionService
{
    public function questionUpdate($id, $request)
    {
        $question = Question::find($id);
        $question->title = $request['title'];
        $question->questionImage = isset($request['questionImage']) == "on" ? 1 : 0;
        $question->choiceImage = isset($request['choiceImage']) == "on" ? 1 : 0;
        $question->typeId = $request['typeId'];
        if (request()->file('imagePath') && isset($request['questionImage'])) {
            $path = request()->file('imagePath')->store('public/questions');
            $question->imagePath = $path;
        }
        $question->save();
    }

    public function questionChoiceUpdate($request)
    {
        foreach ($request as $key => $val) {
            QuestionChoice::find($key)->update([
                'title' => $val,
                'path' => null,
            ]);
        }
    }

    public function questionChoiceKeyUpdate($id, $request)
    {
        QuestionChoiceKey::where('questionId', $id)->update([
            'choiceId' => $request['correct_choice'],
            'questionId' => $id,
        ]);
    }

    public function questionChoiceImageUpdate()
    {
        $req = request()->except(['_token', '_method', 'typeId', 'correct_choice', 'title', 'statusChoiceImage', 'photo', 'choiceImage','questionImage']);
        foreach ($req as $key => $val) {
            if (request()->file($key)) {
                $path = request()->file($key)->store('public/choices');
                QuestionChoice::find($key)->update([
                    'title' => null,
                    'path' => $path,
                ]);
            }
        }
    }
}
