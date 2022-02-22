<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Price;
use App\Models\ServiceItem;
use App\Services\Crud\PriceCrudService;
use App\Services\Crud\ServiceCarTypeCrudService;
use App\Services\Crud\ServiceItemCrudService;
use App\ViewModels\Price\PriceCreateViewModel;
use App\ViewModels\Price\PriceEditViewModel;
use App\ViewModels\Price\PriceListViewModel;
use Illuminate\Http\Request;

class ServiceItemPriceController extends Controller
{

    public function __construct(
        private PriceCrudService $priceCrudService, 
        private ServiceItemCrudService $serviceItemCrudService, 
        private ServiceCarTypeCrudService $serviceCarTypeCrudService)
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
        return view('service-item-price.index', new PriceListViewModel(service:$this->serviceItemCrudService, data:$request->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('service-item-price.create', new PriceCreateViewModel(service:$this->priceCrudService, data:$request->old()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePriceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePriceRequest $request)
    {
        $dto = $request->getData();
        $serviceCarTypes = $this->serviceCarTypeCrudService->createMany($dto->getTypesData());
        $this->priceCrudService->createMany($serviceCarTypes);

        return redirect()->route('service-item-prices.index')->with('success', 'Price create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service_item_price
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceItem $service_item_price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceItem  $service_item_price
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ServiceItem $service_item_price)
    {
        return view('service-item-price.edit', new PriceEditViewModel(service:$this->priceCrudService, data:$request->old(), model:$service_item_price));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePriceRequest  $request
     * @param  \App\Models\ServiceItem  $service_item_price
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePriceRequest $request, ServiceItem $service_item_price)
    {
        $this->priceCrudService->updateMany($request->getData(), $service_item_price);

        return redirect()->route('service-item-prices.index')->with('success', 'Price update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceItem  $service_item_price
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceItem $service_item_price)
    {
        $this->serviceCarTypeCrudService->deleteMany($service_item_price);
        return redirect()->route('service-item-prices.index')->with('success', 'Price delete success');
    }
}
