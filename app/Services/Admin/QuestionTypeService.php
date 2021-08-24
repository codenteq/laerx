<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\QuestionTypeRequest;
use App\Models\QuestionType;
use Illuminate\Support\Str;

class QuestionTypeService
{
    public function store(QuestionTypeRequest $request)
    {
        QuestionType::create([
            'title' => Str::title($request->title)
        ]);
    }

    public function update(QuestionTypeRequest $request, $id)
    {
        QuestionType::find($id)->update([
            'title' => Str::title($request->title)
        ]);
    }

    public function destroy($id)
    {
        QuestionType::find($id)->delete();
    }
}
