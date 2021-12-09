<?php

namespace App\Services\Admin;

use App\Models\LessonContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LessonContentService
{
    public function store($request)
    {
        $request->hasFile('file') ? $path = $request->file('file')->store('lesson-voice', 'public') : $path = null;
        LessonContent::create([
            'title' => Str::title($request->title),
            'content' => $request->content,
            'languageId' => $request->languageId,
            'typeId' => $request->typeId,
            'file' => $path
        ]);
    }

    public function update($request, $id)
    {
        $lesson = LessonContent::find($id);
        $lesson->title = Str::title($request->title);
        $lesson->content = $request->content;
        $lesson->languageId = $request->languageId;
        $lesson->typeId = $request->typeId;
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('lesson-voice', 'public');
            $lesson->file = $path;
        }
        $lesson->save();
    }

    public function destroy($id)
    {
        $lesson = LessonContent::find($id);
        Storage::disk('public')->delete($lesson->file);
        $lesson->delete();
    }
}
