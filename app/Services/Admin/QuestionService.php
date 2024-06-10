<?php

namespace App\Services\Admin;

use App\Models\BugQuestion;
use App\Models\Question;
use App\Models\QuestionChoice;
use App\Models\QuestionChoiceKey;
use App\Services\ImageConvertService;
use Illuminate\Support\Facades\DB;

class QuestionService
{
    protected $convertService;

    protected $except;

    public function __construct(ImageConvertService $convertService)
    {
        $this->convertService = $convertService;
        $this->except = ['_token', '_method', 'typeId', 'correct_choice', 'title', 'description', 'ck_editor', 'statusChoiceImage', 'choiceImage', 'questionImage', 'imagePath', 'languageId'];
    }

    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $question = new Question();
            $question->title = $request->title;
            $question->description = $request->description;
            $question->questionImage = isset($request->questionImage) == 'on' ? 1 : 0;
            $question->choiceImage = isset($request->choiceImage) == 'on' ? 1 : 0;
            $question->languageId = $request->languageId;
            $question->typeId = $request->typeId;
            if ($request->file('imagePath') && isset($request->questionImage)) {
                $path = request()->file('imagePath')->store('questions', 'public');
                $question->imagePath = $path;
            }
            $question->save();

            if ($request->hasFile('imagePath') && isset($request->questionImage)) {
                //ImageConvertJob::dispatch($question->id, 'question', $path)->onQueue('image');
                $this->convertService->execute($question->id, 'question', $path);
            }
            if (isset($request->choiceImage) == 'on') {
                self::choiceImageStore($request, $question->id);
            } else {
                self::choiceStore($request, $question->id);
            }
        });
    }

    public function choiceStore($request, $id)
    {
        for ($i = 1; $i <= 4; $i++) {
            $choiceText = 'choice_text_'.$i;
            $choice = QuestionChoice::create([
                'title' => $request->$choiceText,
                'path' => null,
                'questionId' => $id,
            ]);
            if ($request->correct_choice == $i) {
                self::choiceKeyStore($choice->id, $id);
            }
        }
    }

    public function choiceImageStore($request, $id)
    {
        $request->except($this->except);
        for ($i = 1; $i <= 4; $i++) {
            $choiceImage = 'choice_image_'.$i;
            $path = $request->file($choiceImage)->store('choices', 'public');
            $choice = QuestionChoice::create([
                'title' => null,
                'path' => $path,
                'questionId' => $id,
            ]);
            //ImageConvertJob::dispatch($choice->id, 'questionChoice', $path)->onQueue('image');
            $this->convertService->execute($choice->id, 'questionChoice', $path);
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

    public function update($request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $question = Question::find($id);
            $question->title = $request->title;
            $question->description = $request->description;
            $question->questionImage = isset($request->questionImage) == 'on' ? 1 : 0;
            $question->choiceImage = isset($request->choiceImage) == 'on' ? 1 : 0;
            $question->languageId = $request->languageId;
            $question->typeId = $request->typeId;
            $question->save();

            if (request()->file('imagePath') && isset($request->questionImage)) {
                $path = request()->file('imagePath')->store('questions', 'public');
                $question->imagePath = $path;
                //ImageConvertJob::dispatch($id, 'question', $path)->onQueue('image');
                $this->convertService->execute($id, 'question', $path);
            }

            self::choiceKeyUpdate($request, $id);
            if (isset($request->choiceImage) == 'on') {
                self::choiceImageUpdate($request);
            } else {
                self::choiceUpdate($request);
            }
        });
    }

    public function choiceUpdate($request)
    {
        $req = $request->except($this->except);
        foreach ($req as $key => $val) {
            QuestionChoice::find($key)->update([
                'title' => $val,
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
        $req = $request->except($this->except);
        foreach ($req as $key => $val) {
            if ($request->hasFile($key)) {
                $path = $request->file($key)->store('choices', 'public');
                QuestionChoice::find($key)->update([
                    'title' => null,
                    'path' => $path,
                ]);
                //ImageConvertJob::dispatch($key, 'questionChoice', $path)->onQueue('image');
                $this->convertService->execute($key, 'questionChoice', $path);
            }
        }
    }

    public function destroy($id)
    {
        Question::find($id)->delete();
        QuestionChoice::where('questionId', $id)->delete();
        QuestionChoiceKey::where('questionId', $id)->delete();
    }

    public function bugDestroy($id)
    {
        BugQuestion::find($id)->delete();
    }
}
