<?php

use App\Models\AppointmentSetting;
use App\Models\Invoice;
use App\Models\QuestionChoiceKey;
use App\Models\TestQuestion;
use App\Models\UserAnswer;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

if (!function_exists('ignoreDateCheck')) {
    function ignoreDateCheck($date): bool
    {
        return (bool)AppointmentSetting::where('ignore_date', $date)->where('companyId', companyId())->first();
    }
}

if (!function_exists('companyId')) {
    function companyId(): int
    {
        return auth()->user()->info->companyId;
    }
}

if (!function_exists('currentMounth')) {
    function currentMounth(): array
    {
        $result = CarbonPeriod::create(Carbon::now()->format('d-m-Y'), '1 day', Carbon::now()->addMonth()->format('d-m-Y'));
        foreach ($result as $dt) {
            $months[] = [$dt->format("Y-m-d") => ignoreDateCheck($dt->format("Y-m-d"))];
        }
        return $months;
    }
}

if (!function_exists('invoiceDiffDate')) {
    function invoiceDiffDate($id): int
    {
        $invoice = Invoice::select('end_date')->where('companyId', $id)->orderBy('id', 'desc')->first();
        $end = Carbon::parse($invoice->end_date);
        return $end->diffInDays(Carbon::now());
    }
}

if (!function_exists('imagePath')) {
    function imagePath($path): string
    {
        return '/storage/' . $path;
    }
}


if (!function_exists('totalPoint')) {
    function totalPoint($correct, $length): int
    {
        if ($correct && $length) {
            return 100 / $length * $correct;
        }
        return 0;
    }
}

if (!function_exists('resultStatus')) {
    function resultStatus($point): string
    {
        if ($point) {
            return $point >= 70 ? 'Başarılı' : 'Başarısız';
        }
        return 0;
    }
}
