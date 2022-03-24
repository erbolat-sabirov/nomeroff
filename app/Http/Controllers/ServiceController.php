<?php

namespace App\Http\Controllers;

use App\Dto\ServiceDto;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Services\Crud\PriceCrudService;
use App\Services\Crud\ServiceCarTypeCrudService;
use App\Services\Crud\ServiceCrudService;
use App\ViewModels\Price\PriceCreateViewModel;
use App\ViewModels\Price\PriceEditViewModel;
use DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct(private ServiceCrudService $service)
    {
        $this->authorizeResource(Service::class, 'service');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $models = $this->service->list($request->all(), ['serviceCarTypes']);
        return view('service.index', ['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, PriceCrudService $priceCrudService)
    {
        return view('service.create', new PriceCreateViewModel(service:$priceCrudService, data:$request->old()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        StoreServiceRequest $request, 
        ServiceCarTypeCrudService $serviceCarTypeCrudService,
        PriceCrudService $priceCrudService
    )
    {
        $dto = $request->getData();
        DB::transaction(function() use($dto, $serviceCarTypeCrudService, $priceCrudService){
            $model = $this->service->create($dto);
            $priceDto = $dto->getPriceDto();
            $priceDto->setService_id($model->id);
            $serviceCarTypes = $serviceCarTypeCrudService->createMany($priceDto->getTypesData());
            $priceCrudService->createMany($serviceCarTypes);
            $this->service->createItemIds($priceDto->getServiceItemsData());
        });
        return redirect()->route('services.index')->with('success', 'Успешно создано');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Service $service, PriceCrudService $priceCrudService)
    {
        return view('service.edit', new PriceEditViewModel(service:$priceCrudService, data:$request->old() ?: $service->toArray(), model:$service));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service, PriceCrudService $priceCrudService)
    {
        $dto = $request->getData();
        DB::transaction(function() use ($dto, $service, $priceCrudService){
            $model = $this->service->update($dto, $service);
            $priceDto = $dto->getPriceDto();
            $priceDto->setService_id($model->id);
            $this->service->deleteItemIds($service->id);
            $priceCrudService->updateMany($priceDto, $service);
            $this->service->createItemIds($priceDto->getServiceItemsData());
        });
        return redirect()->route('services.index')->with('success', 'Успешно обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, ServiceCarTypeCrudService $serviceCarTypeCrudService)
    {
        DB::transaction(function() use($service, $serviceCarTypeCrudService){
            $this->service->delete($service);
            $serviceCarTypeCrudService->deleteMany($service);
            $this->service->deleteItemIds($service->id);
        });
        return redirect()->route('services.index')->with('success', 'Успешно удалено');
    }
}
