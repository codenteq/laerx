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

if (!function_exists('questionLength')) {
    function questionLength($id): int
    {
        return TestQuestion::where('testId',$id)->get()->count();
    }
}

if (!function_exists('result')) {
    function result($id): float
    {
        $tests = UserAnswer::where('testId',$id)->where('userId',auth()->id())->get();
        $result = 0;
        foreach ($tests as $test) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId',$test->questionId)->where('choiceId',$test->choiceId)->first();
            $choiceKey === true ? $result++ : null;
        }
        return number_format(100 / $tests->count() * $result,2);
    }
}

if (!function_exists('totalResultTrue')) {
    function totalCorrect(): int
    {
        $tests = UserAnswer::where('userId',auth()->id())->get();
        $result = 0;
        foreach ($tests as $test) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId',$test->questionId)->where('choiceId',$test->choiceId)->first();
            $choiceKey === true ? $result++ : null;
        }
        return $result;
    }
}

if (!function_exists('totalInCorrect')) {
        function totalInCorrect(): int
    {
        $tests = UserAnswer::where('userId',auth()->id())->get();
        $result = 0;
        foreach ($tests as $test) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId',$test->questionId)->where('choiceId',$test->choiceId)->first();
            $choiceKey === false ? $result++ : null;
        }
        return $result;
    }
}

if (!function_exists('totalPoint')) {
    function totalPoint(): float
    {
        $tests = UserAnswer::where('userId',auth()->id())->get();
        $result = 0;
        foreach ($tests as $test) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId',$test->questionId)->where('choiceId',$test->choiceId)->first();
            $choiceKey === true ? $result++ : null;
        }
        return number_format(100 / $tests->count() * $result,2);
    }
}

if (!function_exists('totalResultStatus')) {
    function totalResultStatus($id): string
    {
        $tests = UserAnswer::where('testId',$id)->where('userId',auth()->id())->get();
        $result = 0;
        foreach ($tests as $test) {
            $choiceKey = (bool)QuestionChoiceKey::where('questionId',$test->questionId)->where('choiceId',$test->choiceId)->first();
            $choiceKey === true ? $result++ : null;
        }
        return number_format(100 / $tests->count() * $result,2)  >= 70 ? 'Başarılı' : 'Başarısız';
    }
}
