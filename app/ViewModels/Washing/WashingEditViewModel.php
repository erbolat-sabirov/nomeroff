<?php

namespace App\ViewModels\Washing;

use App\Base\BaseViewModel;
use App\Dto\WashingDto;
use App\Models\Washing;
use App\Services\Crud\ServiceCrudService;
use App\Services\Crud\ServiceItemCrudService;
use App\Services\Crud\UserCrudService;

class WashingEditViewModel extends BaseViewModel
{

    public function model()
    {
        $service_items = $this->model->items->pluck('service_item_id')->toArray();
        $washing_users = $this->model->usersThrough->pluck('user_id')->toArray();

        $modelData = array_merge($this->model->toArray(), [
            'service_items' => $service_items, 
            'washing_users' => $washing_users
        ]);

        return new WashingDto($this->data ?: $modelData);
    }

    public function washing()
    {
        return $this->model;
    }

    public function services()
    {
        return app(ServiceCrudService::class)->pluck('id', 'title');
    }

    public function serviceItems()
    {
        return app(ServiceItemCrudService::class)->pluck('id', 'title');
    }

    public function users()
    {
        return app(UserCrudService::class)->all(['user' => 1])->pluck('name', 'id');
    }
    public function statuses()
    {
        return Washing::getStatusList();
    }
    
}
