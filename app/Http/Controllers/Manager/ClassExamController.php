<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\ClassExamRequest;
use App\Models\ClassExam;
use App\Models\Group;
use App\Models\Month;
use App\Models\Period;
use App\Models\QuestionType;
use App\Services\Manager\ClassExamService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class ClassExamController extends Controller
{
    private $classExamService;

    public function __construct(ClassExamService $classExamService)
    {
        $this->classExamService = $classExamService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $classExams = ClassExam::where('companyId', companyId())
            ->with('classExamQuestionType')
            ->withSum('classExamQuestionType', 'length')
            ->get();
        return view('manager.class-exam.class-exam', compact('classExams'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $periods = Period::all();
        $months = Month::all();
        $groups = Group::all();
        $types = QuestionType::all();
        return view('manager.class-exam.class-exam-add', compact('types', 'periods', 'months', 'groups'));
    }

    /**
     * @param ClassExamRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function store(ClassExamRequest $request)
    {
        try {
            $this->classExamService->store($request);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }


    /**
     *
     */
    public function update($classId)
    {
        $this->classExamService->update($classId);
        return back();
    }

    /**
     * @param $classId
     * @return Application|ResponseFactory|Response
     */
    public function destroy($classId)
    {
        try {
            $this->classExamService->destroy($classId);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
