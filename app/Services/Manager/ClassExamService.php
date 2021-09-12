<?php

namespace App\Services\Manager;

use App\Models\ClassExam;
use App\Models\ClassExamQuestionType;
use App\Models\Test;

class ClassExamService
{
    public function store($request): void
    {
        $test = Test::create(['title' => rand(), 'userId' => auth()->id()]);

        $class = ClassExam::create([
            'testId' => $test->id,
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
        $class = ClassExam::find($id);
        Test::find($class->testId)->delete();
        ClassExamQuestionType::where('classExamId', $id)->delete();
        $class->delete();
    }
}
