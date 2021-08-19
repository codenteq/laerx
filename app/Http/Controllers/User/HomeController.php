<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\LiveLesson;
use App\Models\NotificationUser;
use App\Models\Support;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getDashboard() {
        return view('user.index');
    }

    public function getLessons() {
        return view('user.lessons');
    }

    public function getExams() {
        return view('user.exams');
    }

    public function getClassExams() {
        return view('user.class-exams');
    }

    public function getResults() {
        return view('user.results');
    }

    public function getLiveLessons() {
        $liveLessons = LiveLesson::where('companyId',Helper::companyId())
            ->where('periodId',auth()->user()->info->periodId)
            ->where('monthId',auth()->user()->info->monthId)
            ->where('groupId',auth()->user()->info->groupId)
            ->latest()
            ->get();
        return view('user.live-lessons',compact('liveLessons'));
    }

    public function getProfile() {
        return view('user.profile');
    }

    public function getSupport() {
        return view('user.support');
    }

    public function postSupportStore(Request $request) {
        try {
            Support::create([
                'subject' => $request->subject,
                'message' => $request->message,
                'userId' => auth()->id(),
                'status' => 1
            ]);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    public function getNotifications() {
        $notifications = NotificationUser::where('userId',auth()->id())->get();
        return view('user.notifications',compact('notifications'));
    }
}
