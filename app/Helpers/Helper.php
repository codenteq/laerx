<?php

use App\Models\AppointmentSetting;
use App\Models\Invoice;
use App\Models\QuestionChoiceKey;
use App\Models\TestQuestion;
use App\Models\UserAnswer;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;

function ignoreDateCheck($date): bool
{
    return (bool)AppointmentSetting::where('ignore_date', $date)->where('companyId', companyId())->first();
}

function companyId(): int
{
    return auth()->user()->info->companyId;
}

function languageId(): int
{
    return auth()->user()->info->languageId;
}

function currentMounth(): array
{
    $result = CarbonPeriod::create(Carbon::now()->format('d-m-Y'), '1 day', Carbon::now()->addMonth()->format('d-m-Y'));
    foreach ($result as $dt) {
        $months[] = [$dt->format("Y-m-d") => ignoreDateCheck($dt->format("Y-m-d"))];
    }
    return $months;
}

function invoiceDiffDate($id): int
{
    $invoice = Invoice::select('end_date')->where('companyId', $id)->orderBy('id', 'desc')->first();
    $end = Carbon::parse($invoice->end_date);
    return $end->diffInDays(Carbon::now());
}

function invoiceStatus($id): bool
{
    $invoice = Invoice::select('status')->where('companyId', $id)->orderBy('id', 'desc')->first();
    return $invoice->status == 0;
}

function companyLogo(): string
{
    return '/storage/' . auth()->user()->info->companyInfo->logo;
}

function imagePath($path): string
{
    return '/storage/' . $path;
}

function totalPoint($correct, $length): int
{
    if ($correct && $length) {
        return 100 / $length * $correct;
    }
    return 0;
}

function resultStatus($point): string
{
    if ($point) {
        return $point >= 70 ? 'Başarılı' : 'Başarısız';
    }
    return 0;
}

function examTime($questionLength) {
    if ($questionLength == 50) {
        return 45 . ' dakika';
    }
    return CarbonInterval::seconds($questionLength * 60)->cascade()->forHumans();
}

