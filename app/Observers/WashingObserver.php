<?php

namespace App\Observers;

use App\Models\Washing;
use App\Models\WashingUser;
use App\Services\Crud\WashingCrudService;

class WashingObserver
{
    public function __construct(private WashingCrudService $washingCrudService)
    {
    }

    /**
     * Handle the Washing "created" event.
     *
     * @param  \App\Models\Washing  $washing
     * @return void
     */
    public function created(Washing $washing)
    {
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
        $this->washingCrudService->deleteServiceItems($washing);
        WashingUser::where('washing_id', $washing->id)->delete();
    }

    /**
     * Handle the Washing "deleted" event.
     *
     * @param  \App\Models\Washing  $washing
     * @return void
     */
    public function deleted(Washing $washing)
    {
        $this->washingCrudService->deleteServiceItems($washing);
        WashingUser::where('washing_id', $washing->id)->delete();
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
