<?php

namespace App\Services\Manager;

use App\Http\Requests\Manager\AppointmentRequest;
use App\Models\Appointment;
use App\Models\AppointmentSetting;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentService
{
    public function store(AppointmentRequest $request): void
    {
        Appointment::create([
            'userId' => auth()->user()->type == User::Manager ? $request->userId : auth()->id(),
            'teacherId' => $request->teacherId,
            'carId' => $request->carId,
            'companyId' => companyId(),
            'date' => $request->date,
        ]);
    }

    public function update(AppointmentRequest $request, $id): void
    {
        Appointment::find($id)->update([
            'userId' => auth()->user()->type == User::Manager ? $request->userId : auth()->id(),
            'teacherId' => $request->teacherId,
            'carId' => $request->carId,
            'companyId' => companyId(),
            'date' => $request->date,
        ]);
    }

    public function destroy($id): void
    {
        Appointment::find($id)->delete();
    }

    public function settingStoreAndUpdate(Request $request): void
    {
        $arr = [];
        foreach ($request->except('_token') as $key => $val) {
            array_push($arr, $val);
            AppointmentSetting::updateOrCreate([
                'ignore_date' => $val,
                'companyId' => companyId(),
            ]);
        }
        AppointmentSetting::whereNotIn('ignore_date', $arr)->delete();
    }
}
