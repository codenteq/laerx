<?php

use App\Models\AppointmentSetting;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\QuestionChoiceKey;
use App\Models\TestQuestion;
use App\Models\UserAnswer;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;

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

function examTime($questionLength): string
{
    if ($questionLength == 50) {
        return 45 . ' dakika';
    }
    return CarbonInterval::seconds($questionLength * 60)->cascade()->forHumans();
}

function getSubdomainLogo()
{
    $url = \request()->getHttpHost();
    $subdomain = explode('.', $url)[0];
    $companyLogo = Company::where('subdomain', $subdomain)->with('info')->first();
    return $companyLogo->info->logo ?? null;
}

function getSubdomainCompanyName()
{
    $url = \request()->getHttpHost();
    $subdomain = explode('.', $url)[0];
    $company = Company::where('subdomain', $subdomain)->first();
    return $company->title ?? null;
}

function htmlTagFragmentation($request): array
{
    $data = strip_tags($request->content, '<td>');
    $domdoc = new \DOMDocument();
    $domdoc->loadHTML('<?xml encoding="utf-8" ?>'. $data);
    $users = $domdoc->getElementsByTagName('td');
    $arr = array();
    foreach ($users as $user) {
        array_push($arr, $user->nodeValue);
    }
    $index = 0;
    $arrIndex = 0;
    $userArr = [];
    foreach ($arr as $user) {
        if ($index == 2) {
            $userArr[$arrIndex]['tc'] = $user;
        }
        else if ($index == 3) {
            $surname = Str::afterLast($user, ' ');
            $name = Str::replaceLast($surname, '', $user);
            $userArr[$arrIndex]['name'] = $name;
            $userArr[$arrIndex]['surname'] = $surname;
            $arrIndex++;
        }
        else if ($index == 16)
            $index = 0;
        $index++;
    }

    return $userArr;
}
