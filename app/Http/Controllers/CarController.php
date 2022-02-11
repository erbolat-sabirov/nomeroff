<?php

namespace App\Http\Controllers;

use App\Dto\CarDto;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use App\Services\Crud\CarCrudService;
use App\ViewModels\Car\CarCreateViewModel;
use App\ViewModels\Car\CarEditViewModel;
use App\ViewModels\Car\CarListViewModel;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function __construct(private CarCrudService $carCrudService)
    {
        $this->authorizeResource(Car::class, 'car');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('car.index', new CarListViewModel($this->carCrudService, $request->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('car.create', new CarCreateViewModel(data:$request->old()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarRequest $request)
    {
        $this->carCrudService->create($request->getData());
        return redirect()->route('cars.index')->with('success', 'Машина успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('car.show', ['model' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Car $car)
    {
        return view('car.edit', new CarEditViewModel($this->carCrudService, $request->old(), $car));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $this->carCrudService->update($request->getData(), $car);
        return redirect()->route('cars.index')->with('success', 'Машина успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $this->carCrudService->delete($car);
        return redirect()->route('cars.index')->with('success', 'Машина успешно удалена');
    }
}
