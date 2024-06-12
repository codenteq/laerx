<?php

namespace App\Http\Controllers\Manager;

use App\Excel\Exports\UsersExport;
use App\Excel\Imports\UserImport;
use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\UserRequest;
use App\Models\Group;
use App\Models\Language;
use App\Models\Month;
use App\Models\Period;
use App\Models\Test;
use App\Models\TestResult;
use App\Models\TestResultType;
use App\Models\User;
use App\Models\UserInfo;
use App\Services\GlobalService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class UserController extends Controller
{
    private $globalService;

    public function __construct(GlobalService $globalService)
    {
        $this->globalService = $globalService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $periods = Period::all();
        $groups = Group::all();
        $months = Month::all();
        $users = UserInfo::filter(\request()->all())->where('companyId', companyId())
            ->whereRelation('user', 'type', User::Normal)
            ->with('company', 'user', 'language', 'period', 'month')->latest()->get();

        return view('manager.users.index', compact('users', 'periods', 'groups', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('manager.users.create', [
            'periods' => Period::all(),
            'groups' => Group::all(),
            'languages' => Language::all(),
            'months' => Month::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        try {
            $this->globalService->userStore($request, User::Normal);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit(User $user)
    {
        return view('manager.users.edit', [
            'periods' => Period::all(),
            'groups' => Group::all(),
            'languages' => Language::all(),
            'months' => Month::all(),
            'user' => UserInfo::where('userId', $user->id)->with('company', 'user', 'language', 'period')->first(),
        ]);
    }

    public function getImportMebbis()
    {
        return view('manager.users.import.mebbis', [
            'periods' => Period::all(),
            'groups' => Group::all(),
            'months' => Month::all(),
            'languages' => Language::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            $this->globalService->userUpdate($request, $user->id);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy(User $user)
    {
        try {
            $this->globalService->userDestroy($user->id);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    public function postMultipleDestroy(Request $request)
    {
        try {
            $ids = $request->ids;
            $this->globalService->userMultipleDestroy($ids);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    public function getManagerUserResults()
    {
        $test = cache()->remember('test', 60, function () {
            return Test::whereRelation('userInfo', 'companyId', companyId())->get();
        });
        $testResults = cache()->remember('testResults', 60, function () {
            return TestResult::selectRaw('*, count(*) as count')
                ->selectRaw('sum(correct) as sum_correct')
                ->selectRaw('sum(total_question) as sum_total_question')
                ->whereRelation('userInfo', 'companyId', companyId())
                ->groupBy('userId')->get();
        });

        return view('manager.users.results.index', compact('test', 'testResults'));
    }

    public function getManagerUserResultDetail($userId)
    {
        $resultTypes = TestResultType::where('userId', $userId)
            ->selectRaw('*, sum(correct) as sum_correct')
            ->selectRaw('sum(in_correct) as sum_in_correct')
            ->selectRaw('sum(blank_question) as sum_blank_question')
            ->selectRaw('sum(total_question) as sum_total_question')
            ->groupBy('typeId')
            ->with('type')
            ->get();
        $results = TestResult::where('userId', $userId)->latest()->get();

        return view('manager.users.results.view', compact('resultTypes', 'results'));
    }

    public function getImportExcel()
    {
        return view('manager.users.import.excel');
    }

    public function postImportExcel(Request $request)
    {
        try {
            Excel::import(new UserImport(), $request->excel);

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    public function exportExcel(): BinaryFileResponse
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function postMebbisStore(Request $request)
    {
        $users = htmlTagFragmentation($request);
        try {
            foreach ($users as $user) {
                $request->merge(['tc' => $user['tc']]);
                $request->merge(['name' => $user['name']]);
                $request->merge(['surname' => $user['surname']]);
                $request->merge(['password' => $user['tc']]);
                $request->merge(['status' => 1]);
                $this->globalService->userStore($request, User::Normal);
            }

            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
