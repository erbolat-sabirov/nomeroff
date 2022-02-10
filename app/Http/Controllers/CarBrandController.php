<?php

namespace App\Http\Controllers;

use App\Dto\CarBrandDto;
use App\Http\Requests\StoreCarBrandRequest;
use App\Http\Requests\UpdateCarBrandRequest;
use App\Models\CarBrand;
use App\Services\Crud\CarBrandCrudService;
use App\ViewModels\CarBrand\CarBrandCreateViewModel;
use App\ViewModels\CarBrand\CarBrandEditViewModel;
use App\ViewModels\CarBrand\CarBrandListViewModel;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{

    public function __construct(private CarBrandCrudService $carBrandCrudService)
    {
        $this->authorizeResource(CarBrand::class, 'car_brand');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('car-brand.index', new CarBrandListViewModel($this->carBrandCrudService, $request->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('car-brand.create', new CarBrandCreateViewModel($this->carBrandCrudService, $request->old()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarBrandRequest $request)
    {
        $this->carBrandCrudService->create($request->getData());
        return redirect()->route('car-brands.index')->with('success', 'Car Brand success created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CarBrand  $carBrand
     * @return \Illuminate\Http\Response
     */
    public function show(CarBrand $carBrand)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarBrand  $carBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CarBrand $carBrand)
    {
        return view('car-brand.edit', new CarBrandEditViewModel(service:$this->carBrandCrudService, data:$request->old(), model:$carBrand));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarBrandRequest  $request
     * @param  \App\Models\CarBrand  $carBrand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarBrandRequest $request, CarBrand $carBrand)
    {
        $this->carBrandCrudService->update($request->getData(), $carBrand);
        return redirect()->route('car-brands.index')->with('success', 'Car Brand updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarBrand  $carBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarBrand $carBrand)
    {
        $this->carBrandCrudService->delete($carBrand);
        return redirect()->route('car-brands.index')->with('success', 'Car Brand deleted success');
    }
}
