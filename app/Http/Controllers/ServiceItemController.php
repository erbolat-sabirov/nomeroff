<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceItemRequest;
use App\Http\Requests\UpdateServiceItemRequest;
use App\Models\ServiceItem;
use App\Services\Crud\PriceCrudService;
use App\Services\Crud\ServiceCarTypeCrudService;
use App\Services\Crud\ServiceItemCrudService;
use App\ViewModels\ServiceItem\ServiceItemListViewModel;
use App\ViewModels\ServiceItem\ServiceItemCreateViewModel;
use App\ViewModels\ServiceItem\ServiceItemEditViewModel;
use DB;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
{
    public function __construct(private ServiceItemCrudService $service)
    {
        $this->authorizeResource(Service::class, 'service_item');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('service-item.index', new ServiceItemListViewModel(service:$this->service, data:$request->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('service-item.create', new ServiceItemCreateViewModel(service:$this->service, data:$request->old()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceItemRequest $request, ServiceCarTypeCrudService $serviceCarTypeCrudService, PriceCrudService $priceCrudService)
    {
        $dto = $request->getData();
        DB::transaction(function() use($dto, $serviceCarTypeCrudService, $priceCrudService){
            $model = $this->service->create($dto);
            $priceDto = $dto->getPriceDto();
            $priceDto->setService_id($model->id);
            $serviceCarTypes = $serviceCarTypeCrudService->createMany($priceDto->getTypesData());
            $priceCrudService->createMany($serviceCarTypes);
        });

        return redirect()->route('service-items.index')->with('success', 'Успешно создано');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceItem  $service_item
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ServiceItem $service_item)
    {
        return view('service-item.edit', new ServiceItemEditViewModel(service:$this->service, data:$request->old(), model:$service_item), ['service_item' => $service_item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\ServiceItem  $service_item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceItemRequest $request, ServiceItem $service_item, PriceCrudService $priceCrudService)
    {
        $dto = $request->getData();
        DB::transaction(function() use($dto, $service_item, $priceCrudService){
            $model = $this->service->update($dto, $service_item);
            $priceDto = $dto->getPriceDto();
            $priceDto->setService_id($model->id);
            $priceCrudService->updateMany($priceDto, $service_item);
        });
        return redirect()->route('service-items.index')->with('success', 'Успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceItem  $service_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceItem $service_item, ServiceCarTypeCrudService $serviceCarTypeCrudService)
    {
        DB::transaction(function() use($service_item, $serviceCarTypeCrudService){
            $this->service->delete($service_item);
            $serviceCarTypeCrudService->deleteMany($service_item);
        });
        return redirect()->route('service-items.index')->with('success', 'Успешно удалено');
    }
}
