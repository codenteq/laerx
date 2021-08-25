<?php

namespace App\Services\Manager;

use App\Http\Requests\Manager\LiveLessonRequest;
use App\Models\LiveLesson;
use Illuminate\Support\Str;

class LiveLessonService
{
    public function store(LiveLessonRequest $request)
    {
        LiveLesson::create([
            'title' => Str::title($request->title),
            'live_date' => $request->live_date,
            'url' => $request->url,
            'periodId' => $request->periodId,
            'monthId' => $request->monthId,
            'groupId' => $request->groupId,
            'typeId' => $request->typeId,
            'companyId' => companyId()
        ]);
    }

    public function update(LiveLessonRequest $request, $id)
    {
        LiveLesson::find($id)->update([
            'title' => Str::title($request->title),
            'live_date' => $request->live_date,
            'url' => $request->url,
            'periodId' => $request->periodId,
            'monthId' => $request->monthId,
            'groupId' => $request->groupId,
            'typeId' => $request->typeId,
            'companyId' => companyId()
        ]);
    }

    public function destroy($id)
    {
        LiveLesson::find($id)->delete();
    }
}
