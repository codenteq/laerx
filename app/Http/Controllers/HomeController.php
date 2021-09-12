<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect(): \Illuminate\Http\RedirectResponse
    {
        $type = Auth::user()->type;
        switch($type) {
            case 1:
                return redirect()->route('admin.dashboard');
            case 2:
                return redirect()->route('manager.dashboard');
            case 3:
                return redirect()->route('teacher.appointment.index');
            case 4:
                return redirect()->route('user.dashboard');
        }
    }

    public function logoutUser()
    {
        Auth::logout();
        return redirect('login');
    }

    public function getCity($countryId): JsonResponse
    {
        $cities =  City::where('countryId',$countryId)->get();
        return response()->json($cities);
    }

    public function getState($cityId): JsonResponse
    {
        $states =  State::where('cityId',$cityId)->get();
        return response()->json($states);
    }

}
