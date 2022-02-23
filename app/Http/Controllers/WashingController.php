<?php

namespace App\Http\Controllers;

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
        return view('washing.index', new WashingListViewModel(service:$this->washingCrudService, data:$request->all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('washing.create', new WashingCreateViewModel(service:$this->washingCrudService, data:$request->old()));
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
            DB::transaction(function() use ($request) {
                $model = $this->washingCrudService->create($request->getData());
                $this->washingCrudService->createServiceItems($model, $request->getData());
                $this->washingCrudService->createWashingUsers($request->getData(), $model);
            });

            return redirect()->route('washings.index')->with('success', 'Created');

        } catch (\Exception $e) {
            throw $e;
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Washing  $washing
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Washing $washing)
    {
        return view('washing.edit', new WashingEditViewModel(service:$this->washingCrudService, data:$request->old(), model:$washing));
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
        DB::transaction(function() use ($request, $washing){
            $model = $this->washingCrudService->update($request->getData(), $washing);
            $this->washingCrudService->createServiceItems($model, $request->getData());
            $this->washingCrudService->createWashingUsers($request->getData(), $model);
        });
        return redirect()->route('washings.index')->with('success', 'Updated');
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
        return redirect()->route('washings.index')->with('success', 'Deleted');
    }
}
