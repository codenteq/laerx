<?php

namespace App\Services\Manager;

use App\Http\Requests\Manager\QuestionRequest;
use App\Models\Question;
use App\Models\QuestionChoice;
use App\Models\QuestionChoiceKey;
use Illuminate\Support\Facades\Log;

class QuestionService
{
    public function store(QuestionRequest $request)
    {
        $question = new Question();
        $question->title = $request->title;
        $question->questionImage = isset($request->questionImage) == "on" ? 1 : 0;
        $question->choiceImage = isset($request->choiceImage) == "on" ? 1 : 0;
        $question->typeId = $request->typeId;
        $question->companyId = companyId();
        if ($request->file('imagePath') && isset($request->questionImage)) {
            $path = request()->file('imagePath')->store('questions', 'public');
            $question->imagePath = $path;
        }
        $question->save();
        if (isset($request->choiceImage) == "on")
            self::choiceImageStore($request, $question->id);
        else
            self::choiceStore($request, $question->id);
    }

    public function choiceStore($request, $id)
    {
        for ($i = 1; $i <= 4; $i++) {
            $choiceText = 'choice_text_' . $i;
            $choice = QuestionChoice::create([
                'title' => $request->$choiceText,
                'path' => null,
                'questionId' => $id
            ]);
            if ($request->correct_choice == $i) {
                self::choiceKeyStore($choice->id, $id);
            }
        }
    }

    public function choiceImageStore($request, $id)
    {
        $request->except(['_token', '_method', 'typeId', 'correct_choice', 'title', 'statusChoiceImage', 'photo', 'choiceImage', 'questionImage']);
        for ($i = 1; $i <= 4; $i++) {
            $choiceImage = 'choice_image_' . $i;
            $path = $request->file($choiceImage)->store('choices', 'public');
            $choice = QuestionChoice::create([
                'title' => null,
                'path' => $path,
                'questionId' => $id
            ]);
            self::choiceKeyStore($choice->id, $id);
        }
    }

    public function choiceKeyStore($cId, $qId)
    {
        QuestionChoiceKey::create([
            'choiceId' => $cId,
            'questionId' => $qId,
        ]);
    }

    public function update(QuestionRequest $request, $id)
    {
        $question = Question::find($id);
        $question->title = $request->title;
        $question->questionImage = isset($request->questionImage) == "on" ? 1 : 0;
        $question->choiceImage = isset($request->choiceImage) == "on" ? 1 : 0;
        $question->typeId = $request->typeId;
        if (request()->file('imagePath') && isset($request->questionImage)) {
            $path = request()->file('imagePath')->store('questions', 'public');
            $question->imagePath = $path;
        }
        $question->save();
        self::choiceKeyUpdate($request, $id);
        if (isset($request->choiceImage) == "on")
            self::choiceImageUpdate($request);
        else
            self::choiceUpdate($request);
    }

    public function choiceUpdate($request)
    {
        $req = $request->except(['_token', '_method', 'typeId', 'correct_choice', 'title', 'statusChoiceImage', 'choiceImage', 'questionImage']);
        foreach ($req as $key => $val) {
            Log::info($key);
            QuestionChoice::find($key)->update([
                'title' => $request->input($val),
                'path' => null,
            ]);
        }
    }

    public function choiceKeyUpdate($request, $id)
    {
        QuestionChoiceKey::where('questionId', $id)->update([
            'choiceId' => $request->correct_choice,
            'questionId' => $id,
        ]);
    }

    public function choiceImageUpdate($request)
    {
        $req = $request->except(['_token', '_method', 'typeId', 'correct_choice', 'title', 'statusChoiceImage', 'choiceImage', 'questionImage']);
        foreach ($req as $key => $val) {
            if (request()->file($key)) {
                $path = request()->file($key)->store('choices','public');
                QuestionChoice::find($key)->update([
                    'title' => null,
                    'path' => $path,
                ]);
            }
        }
    }

    public function destroy($id)
    {
        Question::find($id)->delete();
        QuestionChoice::where('questionId', $id)->delete();
        QuestionChoiceKey::where('questionId', $id)->delete();
    }
}
