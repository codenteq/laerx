<?php

namespace App\Http\Controllers\User;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\ClassExam;
use App\Models\Language;
use App\Models\LiveLesson;
use App\Models\NotificationUser;
use App\Models\QuestionType;
use App\Models\Support;
use App\Models\Test;
use App\Models\TestResult;
use App\Models\TestResultType;
use App\Models\UserInfo;
use App\Services\GlobalService;
use App\Services\FirebaseNotificationService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $globalService;

    public function __construct(GlobalService $globalService)
    {
        $this->globalService = $globalService;
    }

    public function getDashboard()
    {
        return view('user.index');
    }

    public function getExams()
    {
        return view('user.exams');
    }

    public function getCustomExamSetting()
    {
        if (request()->get('custom_exam')) {
            $arr = [];
            foreach (\request()->except('custom_exam') as $key => $val) {
                $arr += [$key => $val];
            }
            session(['custom_exam_setting' => $arr]);
            return redirect()->route('user.quiz.custom');
        }
        $types = QuestionType::all();
        return view('user.custom-exam', compact('types'));
    }

    public function getClassExams()
    {
        $classExams = ClassExam::where('periodId', auth()->user()->info->periodId)
            ->where('monthId', auth()->user()->info->monthId)
            ->where('groupId', auth()->user()->info->groupId)
            ->where('status', 1)
            ->where('companyId', companyId())
            ->with('classExamQuestionType')
            ->withSum('classExamQuestionType', 'length')
            ->get();
        return view('user.class-exams', compact('classExams'));
    }

    public function getResults()
    {
        $tests = cache()->remember('test_result_users', 60, function () {
            return TestResult::where('userId', auth()->id())->withCount('testQuestion')->latest()->get();
        });
        return view('user.results', compact('tests'));
    }

    public function getResultDetail($detailId)
    {
        $tests = TestResultType::where('resultId', $detailId)->get();
        $result = TestResult::findOrFail($detailId);
        return view('user.result-detail', compact('tests', 'result'));
    }

    public function getLiveLessons()
    {
        $liveLessons = LiveLesson::where('companyId', companyId())
            ->where('periodId', auth()->user()->info->periodId)
            ->where('monthId', auth()->user()->info->monthId)
            ->where('groupId', auth()->user()->info->groupId)
            ->where('live_date', '>=', Carbon::now())
            ->latest()
            ->get();
        return view('user.live-lessons', compact('liveLessons'));
    }

    public function getProfile()
    {
        $user = UserInfo::where('userId', auth()->id())->with('language', 'user')->first();
        $languages = Language::all();
        return view('user.profile', compact('user', 'languages'));
    }

    public function postProfileUpdate(UserRequest $request)
    {
        try {
            $this->globalService->userUpdate($request, auth()->id());
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    public function getSupport()
    {
        return view('user.support');
    }

    public function postSupportStore(Request $request)
    {
        try {
            Support::create([
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
                'userId' => auth()->id(),
            ]);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    public function getNotifications()
    {
        $notifications = NotificationUser::where('userId', auth()->id())->get();
        return view('user.notifications', compact('notifications'));
    }

    public function token(FirebaseNotificationService $notificationService, Request $request)
    {
        $notificationService->setToken($request);
    }
}
