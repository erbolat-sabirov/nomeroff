<?php

namespace App\Observers;

use App\Models\Washing;
use App\Services\Crud\WashingCrudService;
use App\Services\Crud\WashingTimeCrudService;

class WashingObserver
{
    public function __construct(private WashingCrudService $washingCrudService, private WashingTimeCrudService $washingCrudTimeService)
    {
    }

    public function saved(Washing $washing)
    {
        if ($washing->wasChanged('status')) {
            $dto = $this->washingCrudTimeService->setData($washing);
            $this->washingCrudTimeService->create($dto);
        }

    }

    /**
     * Handle the Washing "created" event.
     *
     * @param  \App\Models\Washing  $washing
     * @return void
     */
    public function created(Washing $washing)
    {
        $dto = $this->washingCrudTimeService->setData($washing);
        $this->washingCrudTimeService->create($dto);
    }

    /**
     * Handle the Washing "updated" event.
     *
     * @param  \App\Models\Washing  $washing
     * @return void
     */
    public function updated(Washing $washing)
    {
        //
    }

    /**
     * Handle the Washing "updated" event.
     *
     * @param  \App\Models\Washing  $washing
     * @return void
     */
    public function updating(Washing $washing)
    {
        $this->washingCrudService->deleteRelations($washing);
    }

    /**
     * Handle the Washing "deleted" event.
     *
     * @param  \App\Models\Washing  $washing
     * @return void
     */
    public function deleted(Washing $washing)
    {
        $this->washingCrudService->deleteRelations($washing);
    }

    /**
     * Handle the Washing "restored" event.
     *
     * @param  \App\Models\Washing  $washing
     * @return void
     */
    public function restored(Washing $washing)
    {
        //
    }

    /**
     * Handle the Washing "force deleted" event.
     *
     * @param  \App\Models\Washing  $washing
     * @return void
     */
    public function forceDeleted(Washing $washing)
    {
        //
    }
}
