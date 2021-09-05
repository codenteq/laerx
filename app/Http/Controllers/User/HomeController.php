<?php

namespace App\Http\Controllers\User;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\Language;
use App\Models\LiveLesson;
use App\Models\NotificationUser;
use App\Models\Support;
use App\Models\Test;
use App\Models\TestResult;
use App\Models\TestResultType;
use App\Models\UserInfo;
use App\Services\GlobalService;
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

    public function getClassExams()
    {
        return view('user.class-exams');
    }

    public function getResults()
    {
        $tests = cache()->remember('test_result_users',60, function () {
           return TestResult::where('userId',auth()->id())->withCount('testQuestion')->latest()->get();
        });
        return view('user.results', compact('tests'));
    }

    public function getResultDetail($detailId)
    {
        $tests = TestResultType::where('resultId',$detailId)->get();
        $result =  TestResult::findOrFail($detailId);
        return view('user.result-detail',compact('tests','result'));
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
}
