<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Price;
use App\Models\Service;
use App\Services\Crud\PriceCrudService;
use App\Services\Crud\ServiceCarTypeCrudService;
use App\Services\Crud\ServiceCrudService;
use App\ViewModels\Price\PriceCreateViewModel;
use App\ViewModels\Price\PriceEditViewModel;
use App\ViewModels\Price\PriceListViewModel;
use DB;
use Illuminate\Http\Request;

class ServicePriceController extends Controller
{

    public function __construct(
        private PriceCrudService $priceCrudService,
        private ServiceCrudService $serviceCrudService,
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
        $dto = $request->getData();
        DB::transaction(function() use($dto){
            $serviceCarTypes = $this->serviceCarTypeCrudService->createMany($dto->getTypesData());
            $this->priceCrudService->createMany($serviceCarTypes);
            $this->serviceCrudService->createItemIds($dto->getServiceItemsData());
        });

        return redirect()->route('services.index')->with('success', 'Цена успешно создана');
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
        $dto = $request->getData();
        DB::transaction(function() use ($dto, $service_price){
            $this->serviceCrudService->deleteItemIds($service_price->id);
            $this->priceCrudService->updateMany($dto, $service_price);
            $this->serviceCrudService->createItemIds($dto->getServiceItemsData());
        });

        return redirect()->route('services.index')->with('success', 'Цена успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service_price)
    {
        DB::transaction(function() use($service_price){
            $this->serviceCarTypeCrudService->deleteMany($service_price);
            $this->serviceCrudService->deleteItemIds($service_price->id);
        });
        return redirect()->route('services.index')->with('success', 'Цена успешно удалена');
    }
}
