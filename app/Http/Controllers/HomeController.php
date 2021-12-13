<?php

namespace App\Http\Controllers;

use App\Http\Constants\ResponseMessage;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Invoice;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     * @return RedirectResponse
     */
    public function redirect(): RedirectResponse
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

    public function postCouponCode(Request $request, $companyId = null)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->where('start_date', '<=', now())->where('end_date', '>=', now())->first();
        if ($coupon) {
            $id = auth()->user()->type == User::Admin ? $companyId : companyId();
            $invoice = Invoice::where('companyId', $id)->orderBy('id', 'desc')->first();
            $discount = $invoice->price / 100 * $coupon->discount;
            $data = [
                'price' => $invoice->price,
                'total_amount' => $invoice->price - $discount,
                'discount' => $discount,
                'couponId' => $coupon->id
            ];
            session(['cart' => $data]);
            return response()->json($data);
        }
        return response(ResponseMessage::CouponMessage());
    }

}
