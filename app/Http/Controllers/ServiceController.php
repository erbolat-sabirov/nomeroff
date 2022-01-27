<?php

namespace App\Http\Controllers;

use App\Dto\ServiceDto;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Services\Crud\ServiceCrudService;
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
        $models = $this->service->list();
        return view('service.index', ['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $model = new ServiceDto($request->old());
        return view('service.create', ['model' => $model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $model = $this->service->create($request->getData());
        return redirect()->route('services.index')->with('success', 'Success created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Service $service)
    {
        $model = new ServiceDto($request->old() ?? $service->toArray());
        return view('service.edit', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $model = $this->service->update($request->getData(), $service);
        return redirect()->route('services.index')->with('success', 'Success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $model = $this->service->delete($service);
        return redirect()->route('services.index')->with('success', 'Success deleted');
    }
}
