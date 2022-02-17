<?php

namespace App\ViewModels\Price;

use App\Base\BaseViewModel;
use App\Dto\PriceDto;
use App\Services\Crud\CarTypeCrudService;
use App\Services\Crud\ServiceCrudService;

class PriceEditViewModel extends BaseViewModel
{

    public function model()
    {
        $serviceCarTypes = $this->model->serviceCarTypes;

        $types = [];

        foreach ($serviceCarTypes as $key => $value) {
            $types[$value->carType->id]['amount'] = $value->price->id;
        }

        $data = [
            'model' => $this->data['model'] ?? get_class($this->model),
            'service_id' => $this->data['service_id'] ?? $this->model->id,
            'types' => $this->data['types'] ?? $types
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
}
