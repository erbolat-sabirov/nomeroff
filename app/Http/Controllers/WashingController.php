<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWashingRequest;
use App\Http\Requests\UpdateWashingRequest;
use App\Models\Washing;

class WashingController extends Controller
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
     * @param  \App\Http\Requests\StoreWashingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWashingRequest $request)
    {
        //
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
    public function edit(Washing $washing)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Washing  $washing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Washing $washing)
    {
        //
    }
}
