<?php

namespace App\Http\Controllers;

use App\Dto\ServiceCarTypeDto;
use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Price;
use App\Models\Service;
use App\Models\ServiceCarType;
use App\Services\Crud\PriceCrudService;
use App\Services\Crud\ServiceCarTypeCrudService;
use App\Services\Crud\ServiceCrudService;
use App\ViewModels\Price\PriceCreateViewModel;
use App\ViewModels\Price\PriceEditViewModel;
use App\ViewModels\Price\PriceListViewModel;
use Illuminate\Http\Request;

class ServicePriceController extends Controller
{

    public function __construct(private PriceCrudService $priceCrudService, private ServiceCrudService $serviceCrudService, private ServiceCarTypeCrudService $serviceCarTypeCrudService)
    {
        $this->authorizeResource(Price::class, 'price');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('service-price.index', new PriceListViewModel(service:$this->serviceCrudService, data:$request->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('service-price.create', new PriceCreateViewModel(service:$this->priceCrudService, data:$request->old()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePriceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePriceRequest $request)
    {
        $this->priceCrudService->createMany($request->getData());

        return redirect()->route('service-prices.index')->with('success', 'Price create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service_price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Service $service_price)
    {
        return view('service-price.edit', new PriceEditViewModel(service:$this->priceCrudService, data:$request->old(), model:$service_price));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePriceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePriceRequest $request, Service $service_price)
    {
        $this->priceCrudService->updateMany($request->getData(), $service_price);

        return redirect()->route('service-prices.index')->with('success', 'Price update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service_price)
    {
        $this->serviceCarTypeCrudService->deleteMany($service_price);
        return redirect()->route('service-prices.index')->with('success', 'Price delete success');
    }
}
