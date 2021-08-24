<?php

if (!function_exists('ignoreDateCheck')) {
    function ignoreDateCheck($date): bool
    {
        return (bool)\App\Models\AppointmentSetting::where('ignore_date', $date)->where('companyId', companyId())->first();
    }
}

if (!function_exists('companyId')) {
    function companyId() : int
    {
        return auth()->user()->info->companyId;
    }
}

if (!function_exists('currentMounth')) {
    function currentMounth(): array
    {
        $result = \Carbon\CarbonPeriod::create(\Carbon\Carbon::now()->format('d-m-Y'), '1 day', \Carbon\Carbon::now()->addMonth()->format('d-m-Y'));
        foreach ($result as $dt) {
            $months[] = [$dt->format("Y-m-d") => ignoreDateCheck($dt->format("Y-m-d"))];
        }
        return $months;
    }
}

