<?php

namespace App\ViewModels\CarType;

use App\Base\BaseViewModel;

class CarTypeListViewModel extends BaseViewModel
{

    public function models()
    {
        return $this->service->list($this->data);
    }
}
