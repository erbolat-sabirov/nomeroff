<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarTypeRequest;
use App\Http\Requests\UpdateCarTypeRequest;
use App\Models\CarType;
use App\Services\Crud\CarTypeCrudService;
use App\ViewModels\CarType\CarTypeCreateViewModel;
use App\ViewModels\CarType\CarTypeEditViewModel;
use App\ViewModels\CarType\CarTypeListViewModel;
use Illuminate\Http\Request;

class CarTypeController extends Controller
{

    public function __construct(public CarTypeCrudService $carTypeCrudService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('car-type.index', new CarTypeListViewModel(service:$this->carTypeCrudService, data:$request->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('car-type.create', new CarTypeCreateViewModel(service:$this->carTypeCrudService, data:$request->old()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarTypeRequest $request)
    {
        $this->carTypeCrudService->create($request->getData());
        return redirect()->route('car-type.index')->with('success', 'Тип машины создан успешно');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function show(CarType $carType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CarType $carType)
    {
        return view('car-type.edit', new CarTypeEditViewModel(service:$this->carTypeCrudService, data:$request->old(), model:$carType), ['carType' => $carType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarTypeRequest  $request
     * @param  \App\Models\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarTypeRequest $request, CarType $carType)
    {
        $this->carTypeCrudService->update($request->getData(), $carType);
        return redirect()->route('car-type.index')->with('success', 'Тип машины успешно обновлён');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarType  $carType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarType $carType)
    {
        $this->carTypeCrudService->delete($carType);
        return redirect()->route('car-type.index')->with('success', 'Тип машины успешно удалён');
    }
}
