<?php

namespace App\ViewModels\CarModel;

use App\Base\BaseViewModel;

class CarModelListViewModel extends BaseViewModel
{

    public function models()
    {
        return $this->service->list($this->data);
    }
}
