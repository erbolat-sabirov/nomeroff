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
        $modelData = array_merge($this->model->toArray(), ['service_items' => $service_items]);

        return new WashingDto($this->data ?: $modelData);
    }

}
