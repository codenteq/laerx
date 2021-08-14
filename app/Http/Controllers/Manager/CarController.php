<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\CarRequest;
use App\Models\Car;
use App\Models\CarType;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('type')->get();
        return view('manager.cars.cars-list', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartypes = CarType::all();
        return view('manager.cars.cars-add', compact('cartypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Manager\CarRequest $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function store(Car $car, CarRequest $request)
    {
        try {
            $car->create([
                'plate_code' => strtoupper($request->plate_code),
                'companyId' => auth()->user()->info->companyId,
                'typeId' => $request->typeId,
                'status' => $request->status === "on" ? 1 : 0
            ]);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('manager.cars.cars-edit', [
            'car' => $car,
            'cartypes' => CarType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Manager\CarRequest $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, Car $car)
    {
        try {
            $car->update([
                'plate_code' => strtoupper($request->plate_code),
                'companyId' => auth()->user()->info->companyId,
                'typeId' => $request->typeId,
                'status' => $request->status === "on" ? 1 : 0
            ]);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        try {
            $car->delete();
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}
