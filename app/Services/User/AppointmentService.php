<?php

namespace App\Services\User;

use App\Models\Appointment;

class AppointmentService
{
    public function store($request)
    {
        Appointment::create([
            'date' => $request->date,
            'teacherId' => $request->teacherId,
            'carId' => $request->carId,
            'userId' => auth()->id(),
            'companyId' => companyId(),
        ]);
    }
}
