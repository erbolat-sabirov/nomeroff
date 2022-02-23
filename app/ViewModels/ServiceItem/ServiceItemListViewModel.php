<?php

namespace App\ViewModels\ServiceItem;

use App\Base\BaseViewModel;

class ServiceItemListViewModel extends BaseViewModel
{

    public function models()
    {
        return $this->service->list($this->data);
    }
}
