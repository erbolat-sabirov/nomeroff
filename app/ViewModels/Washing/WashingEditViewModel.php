<?php

namespace App\ViewModels\Washing;

use App\Base\BaseViewModel;
use App\Dto\WashingDto;

class WashingEditViewModel extends BaseViewModel
{

    public function model()
    {
        $service_items = $this->model->items->pluck('service_item_id')->transform(function($item){
            return ['service_item_id' => $item];
        })->toArray();
        $washing_users = $this->model->usersThrough->pluck('user_id')->transform(function($item){
            return ['user_id' => $item];
        })->toArray();

        $modelData = array_merge($this->model->toArray(), [
            'service_items' => $service_items, 
            'washing_users' => $washing_users
        ]);

        return new WashingDto($this->data ?: $modelData);
    }

}
