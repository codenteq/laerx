<?php

namespace App\Helpers;

use App\Models\AppointmentSetting;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Arr;

class Helper
{
    public static function ignoreDateCheck($date)
    {
        return (bool)AppointmentSetting::where('ignore_date',$date)->where('companyId',self::companyId())->first();
    }

    public static function companyId()
    {
        return auth()->user()->info->companyId;
    }

    public static function currentMounth()
    {
        $result = CarbonPeriod::create(Carbon::now()->format('d-m-Y'), '1 day', Carbon::now()->addMonth()->format('d-m-Y'));
        foreach ($result as $dt) {
            $months[] = [$dt->format("Y-m-d") => self::ignoreDateCheck($dt->format("Y-m-d"))];
        }
        return $months;
    }
}
