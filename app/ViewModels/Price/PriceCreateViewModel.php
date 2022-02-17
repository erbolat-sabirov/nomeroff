<?php

namespace App\ViewModels\Price;

use App\Base\BaseViewModel;
use App\Dto\PriceDto;
use App\Services\Crud\CarTypeCrudService;
use App\Services\Crud\ServiceCrudService;

class PriceCreateViewModel extends BaseViewModel
{

    public function model()
    {
        return new PriceDto($this->data);
    }

    public function services()
    {
        $services = app(ServiceCrudService::class);
        return $services->all();
    }

    public function types()
    {
        $typeService = app(CarTypeCrudService::class);
        return $typeService->all();
    }

}
