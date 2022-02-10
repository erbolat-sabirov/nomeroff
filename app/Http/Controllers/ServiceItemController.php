<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceItemRequest;
use App\Http\Requests\UpdateServiceItemRequest;
use App\Models\ServiceItem;

class ServiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceItem  $serviceItem
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceItem $serviceItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceItem  $serviceItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceItem $serviceItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceItemRequest  $request
     * @param  \App\Models\ServiceItem  $serviceItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceItemRequest $request, ServiceItem $serviceItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceItem  $serviceItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceItem $serviceItem)
    {
        //
    }
}
