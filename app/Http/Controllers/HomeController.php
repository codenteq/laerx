<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
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

    public function logoutUser()
    {
        Auth::logout();
        return redirect('login');
    }

    public function getCity($countryId)
    {
        $cities =  City::where('countryId',$countryId)->get();
        return response()->json($cities);
    }

    public function getState($cityId)
    {
        $states =  State::where('cityId',$cityId)->get();
        return response()->json($states);
    }

}
