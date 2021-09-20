<?php

namespace App\Services\Manager;

use App\Http\Requests\Manager\CarRequest;
use App\Models\Car;

class CarService
{
    public function store(CarRequest $request)
    {
        Car::create([
            'plate_code' => strtoupper($request->plate_code),
            'companyId' => companyId(),
            'typeId' => $request->typeId,
            'status' => $request->status
        ]);
    }

    public function update(CarRequest $request, $id)
    {
        Car::find($id)->update([
            'plate_code' => strtoupper($request->plate_code),
            'companyId' => companyId(),
            'typeId' => $request->typeId,
            'status' => $request->status ?? 0
        ]);
    }

    public function destroy($id)
    {
        Car::find($id)->delete();
    }
}
