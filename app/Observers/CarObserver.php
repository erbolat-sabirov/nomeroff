<?php

namespace App\Observers;

use App\Dto\WashingDto;
use App\Models\Car;
use App\Services\Crud\WashingCrudService;

class CarObserver
{

    public function __construct(private WashingCrudService $washingCrudService)
    {
    }

    /**
     * Handle the Car "created" event.
     *
     * @param  \App\Models\Car  $car
     * @return void
     */
    public function created(Car $car)
    {
        $this->washingCrudService->create(new WashingDto(['car_id' => $car->id]));
    }

    /**
     * Handle the Car "updated" event.
     *
     * @param  \App\Models\Car  $car
     * @return void
     */
    public function updated(Car $car)
    {
        //
    }

    /**
     * Handle the Car "deleted" event.
     *
     * @param  \App\Models\Car  $car
     * @return void
     */
    public function deleted(Car $car)
    {
        //
    }

    /**
     * Handle the Car "restored" event.
     *
     * @param  \App\Models\Car  $car
     * @return void
     */
    public function restored(Car $car)
    {
        //
    }

    /**
     * Handle the Car "force deleted" event.
     *
     * @param  \App\Models\Car  $car
     * @return void
     */
    public function forceDeleted(Car $car)
    {
        //
    }
}
