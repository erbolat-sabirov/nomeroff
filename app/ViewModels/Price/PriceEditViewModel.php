<?php

namespace App\ViewModels\Price;

use App\Base\BaseViewModel;
use App\Dto\PriceDto;
use App\Models\ServiceItem;
use App\Services\Crud\CarTypeCrudService;
use App\Services\Crud\ServiceItemCrudService;

class PriceEditViewModel extends BaseViewModel
{

    public function model()
    {
        $serviceCarTypes = $this->model->serviceCarTypes;

        $types = [];

        foreach ($serviceCarTypes as $key => $value) {
            $types[$value->carType->id]['amount'] = $value->price?->amount;
        }

        $service_items = [];

        if (isset($this->model->items)) {
            foreach ($this->model->items as $key => $item) {
                $service_items[$item->id]['id'] = $item->id;
            }
        }

        $data = [
            'model' => $this->data['model'] ?? get_class($this->model),
            'service_id' => $this->data['service_id'] ?? $this->model->id,
            'types' => $this->data['types'] ?? $types,
            'service_items' => $this->data['service_items'] ?? $service_items
        ];

        return new PriceDto($data);
    }

    public function service()
    {
        return $this->model;
    }


    public function types()
    {
        $typeService = app(CarTypeCrudService::class);
        return $typeService->all();
    }

    public function allServiceItems()
    {
        return app(ServiceItemCrudService::class)->all();
    }

    public function serviceItems()
    {
        return $this->model->items ?? null;
    }
}
