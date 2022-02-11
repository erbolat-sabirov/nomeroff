<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarModelRequest;
use App\Http\Requests\UpdateCarModelRequest;
use App\Models\CarModel;
use App\Services\Crud\CarModelCrudService;
use App\ViewModels\CarModel\CarModelCreateViewModel;
use App\ViewModels\CarModel\CarModelEditViewModel;
use App\ViewModels\CarModel\CarModelListViewModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{

    public function __construct(public CarModelCrudService $carModelCrudService)
    {
        $this->authorizeResource(CarModel::class, 'car_model');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('car-model.index', new CarModelListViewModel(service:$this->carModelCrudService, data:$request->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('car-model.create', new CarModelCreateViewModel(service:$this->carModelCrudService, data:$request->old()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarModelRequest $request)
    {
        $this->carModelCrudService->create($request->getData());
        return redirect()->route('car-model.index')->with('success', 'Модель машины успешно создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function show(CarModel $carModel)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CarModel $carModel)
    {
        return view('car-model.edit', new CarModelEditViewModel(service:$this->carModelCrudService, data:$request->old(), model:$carModel), ['carModel' => $carModel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarModelRequest  $request
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarModelRequest $request, CarModel $carModel)
    {
        $this->carModelCrudService->update($request->getData(), $carModel);
        return redirect()->route('car-model.index')->with('success', 'Модель машины успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarModel  $carModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarModel $carModel)
    {
        $this->carModelCrudService->delete($carModel);
        return redirect()->route('car-model.index')->with('success', 'Модель машины успешно удалена');
    }
}
