<?php

namespace App\ViewModels\Price;

use App\Base\BaseViewModel;

class PriceListViewModel extends BaseViewModel
{

    public function models()
    {
        $models = $this->service->list($this->data);

        return $models;
    }
}
