<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWashingRequest;
use App\Http\Requests\UpdateWashingRequest;
use App\Models\Washing;
use App\Services\Crud\WashingCrudService;
use App\ViewModels\Washing\WashingCreateViewModel;
use App\ViewModels\Washing\WashingEditViewModel;
use App\ViewModels\Washing\WashingListViewModel;
use DB;
use Illuminate\Http\Request;

class WashingController extends Controller
{

    public function __construct(private WashingCrudService $washingCrudService)
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = new WashingListViewModel(service:$this->washingCrudService, data:$request->all());
        return $data->toResponse($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWashingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWashingRequest $request)
    {
        try {
            $model = DB::transaction(function() use ($request) {
                $model = $this->washingCrudService->create($request->getData());
                $this->washingCrudService->createServiceItems($model, $request->getData());
                $this->washingCrudService->createWashingUsers($request->getData(), $model);

                return $model;
            });

            return response()->json([
                'message' => 'success', 
                'data' => $this->washingCrudService->find(model:$model->id, with:['car', 'service', 'serviceItems', 'users'])
            ]);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Washing  $washing
     * @return \Illuminate\Http\Response
     */
    public function show(Washing $washing)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWashingRequest  $request
     * @param  \App\Models\Washing  $washing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWashingRequest $request, Washing $washing)
    {
        $model = DB::transaction(function() use ($request, $washing){
            $this->washingCrudService->deleteRelations($washing);
            $model = $this->washingCrudService->update($request->getData(), $washing);
            $this->washingCrudService->createServiceItems($model, $request->getData());
            $this->washingCrudService->createWashingUsers($request->getData(), $model);

            return $model;
        });
        return response()->json([
            'message' => 'success', 
            'data' => $this->washingCrudService->find(model:$model->id, with:['car', 'service', 'serviceItems', 'users'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Washing  $washing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Washing $washing)
    {
        $this->washingCrudService->delete($washing);
        return response()->json($washing->toArray());
    }
}