<?php

namespace App\ViewModels\Car;

use App\Base\BaseViewModel;

class CarListViewModel extends BaseViewModel
{
    
    public function models()
    {
        return $this->service->list($this->data);
    }
}
