<?php

namespace App\Helpers;

use App\Models\AppointmentSetting;

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
}
