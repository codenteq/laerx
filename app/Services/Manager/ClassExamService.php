<?php

namespace App\Services\Manager;

use App\Models\ClassExam;
use App\Models\ClassExamQuestionType;
use App\Models\Test;

class ClassExamService
{
    public function store($request): void
    {

        $class = ClassExam::create([
            'companyId' => companyId(),
            'periodId' => $request->periodId,
            'monthId' => $request->monthId,
            'groupId' => $request->groupId,
        ]);

        foreach ($request->except(['_token','periodId','monthId','groupId']) as $key => $value) {
            ClassExamQuestionType::create([
                'classExamId' => $class->id,
                'typeId' => $key,
                'length' => $value
            ]);
        }
    }

    public function update($classId): void
    {
        $class = ClassExam::find($classId);
        $class->status =  $class->status == 1 ? 0 : 1;
        $class->save();
    }

    public function destroy($id): void
    {
        ClassExam::find($id)->delete();
        ClassExamQuestionType::where('classExamId', $id)->delete();
    }
}
