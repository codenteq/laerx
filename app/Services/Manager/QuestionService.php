<?php

namespace App\Services\Manager;

use App\Http\Requests\Manager\QuestionRequest;
use App\Jobs\ImageConvertJob;
use App\Models\BugQuestion;
use App\Models\CompanyQuestion;
use App\Models\Question;
use App\Models\QuestionChoice;
use App\Models\QuestionChoiceKey;
use App\Services\ImageConvertService;
use Illuminate\Support\Facades\DB;

class QuestionService
{
    protected $convertService;

    public function __construct(ImageConvertService $convertService)
    {
        $this->convertService = $convertService;
    }

    /**
     * @param QuestionRequest $request
     */
    public function store(QuestionRequest $request)
    {
        DB::transaction(function () use ($request) {
            $question = new Question();
            $question->title = $request->title;
            $question->description = $request->description;
            $question->questionImage = isset($request->questionImage) == "on" ? 1 : 0;
            $question->choiceImage = isset($request->choiceImage) == "on" ? 1 : 0;
            $question->languageId = $request->languageId;
            $question->typeId = $request->typeId;
            if ($request->file('imagePath') && isset($request->questionImage)) {
                $path = request()->file('imagePath')->store('questions', 'public');
                $question->imagePath = $path;
            }
            $question->save();

            self::companyQuestion($question->id);
            if ($request->file('imagePath') && isset($request->questionImage)) {
                //ImageConvertJob::dispatch($question->id, 'question', $path)->onQueue('image');
                $this->convertService->execute($question->id, 'question', $path);
            }
            if (isset($request->choiceImage) == "on") {
                self::choiceImageStore($request, $question->id);
            } else {
                self::choiceStore($request, $question->id);
            }
        });
    }

    /**
     * @param $request
     * @param $id
     */
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

    /**
     * @param $request
     * @param $id
     */
    public function choiceImageStore($request, $id)
    {
        $request->except(['_token', '_method', 'typeId', 'correct_choice', 'title', 'description', 'ck_editor', 'statusChoiceImage', 'photo', 'choiceImage', 'questionImage', 'imagePath']);
        for ($i = 1; $i <= 4; $i++) {
            $choiceImage = 'choice_image_' . $i;
            $path = $request->file($choiceImage)->store('choices', 'public');
            $choice = QuestionChoice::create([
                'title' => null,
                'path' => $path,
                'questionId' => $id
            ]);
            //ImageConvertJob::dispatch($choice->id, 'questionChoice', $path)->onQueue('image');
            $this->convertService->execute($choice->id, 'questionChoice', $path);
            self::choiceKeyStore($choice->id, $id);
        }
    }

    /**
     * @param $cId
     * @param $qId
     */
    public function choiceKeyStore($cId, $qId)
    {
        QuestionChoiceKey::create([
            'choiceId' => $cId,
            'questionId' => $qId,
        ]);
    }

    /**
     * @param QuestionRequest $request
     * @param $id
     */
    public function update(QuestionRequest $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $question = Question::find($id);
            $question->title = $request->title;
            $question->description = $request->description;
            $question->questionImage = isset($request->questionImage) == "on" ? 1 : 0;
            $question->choiceImage = isset($request->choiceImage) == "on" ? 1 : 0;
            $question->languageId = $request->languageId;
            $question->typeId = $request->typeId;
            $question->save();

            if (request()->file('imagePath') && isset($request->questionImage)) {
                $path = request()->file('imagePath')->store('questions', 'public');
                //ImageConvertJob::dispatch($id, 'question', $path)->onQueue('image');
                $this->convertService->execute($id, 'question', $path);
            }

            self::choiceKeyUpdate($request, $id);
            if (isset($request->choiceImage) == "on")
                self::choiceImageUpdate($request);
            else
                self::choiceUpdate($request);
        });
    }

    /**
     * @param $request
     */
    public function choiceUpdate($request)
    {
        $req = $request->except(['_token', '_method', 'typeId', 'correct_choice', 'title', 'description', 'ck_editor', 'statusChoiceImage', 'choiceImage', 'questionImage', 'imagePath', 'languageId']);
        foreach ($req as $key => $val) {
            QuestionChoice::find($key)->update([
                'title' => $val,
                'path' => null,
            ]);
        }
    }

    /**
     * @param $request
     * @param $id
     */
    public function choiceKeyUpdate($request, $id)
    {
        QuestionChoiceKey::where('questionId', $id)->update([
            'choiceId' => $request->correct_choice,
            'questionId' => $id,
        ]);
    }

    /**
     * @param $request
     */
    public function choiceImageUpdate($request)
    {
        $req = $request->except(['_token', '_method', 'typeId', 'correct_choice', 'title', 'description', 'ck_editor', 'statusChoiceImage', 'choiceImage', 'questionImage', 'imagePath', 'languageId']);
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

    /**
     * @param $id
     */
    public function destroy($id)
    {
        Question::find($id)->delete();
        QuestionChoice::where('questionId', $id)->delete();
        QuestionChoiceKey::where('questionId', $id)->delete();
        CompanyQuestion::where('questionId', $id)->delete();
    }

    /**
     * @param $questionId
     * @param $companyId
     */
    public function companyQuestion($questionId)
    {
        CompanyQuestion::create([
            'questionId' => $questionId,
            'companyId' => companyId()
        ]);
    }

    public function bugDestroy($id)
    {
        BugQuestion::find($id)->delete();
    }
}
