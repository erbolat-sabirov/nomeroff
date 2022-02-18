<?php

namespace App\ViewModels\CarType;

use App\Base\BaseViewModel;

class ServiceItemListViewModel extends BaseViewModel
{

    public function models()
    {
        return $this->service->list($this->data);
    }
}
