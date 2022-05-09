<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\CarRequest;
use App\Models\Car;
use App\Models\CarType;
use App\Services\Manager\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('type')->where('companyId',companyId())->latest()->get();
        return view('manager.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cartypes = CarType::all();
        return view('manager.cars.create', compact('cartypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Manager\CarRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        try {
            $this->carService->store($request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('manager.cars.edit', [
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
            $this->carService->update($request,$car->id);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
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
            $this->carService->destroy($car->id);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
