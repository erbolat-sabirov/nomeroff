<?php

namespace App\ViewModels\Car;

use App\Base\BaseViewModel;

class CarListViewModel extends BaseViewModel
{
    
    public function models()
    {
        $models = $this->service->list($this->data, ['carModel', 'carBrand', 'carType']);
        return $models;
    }
}
