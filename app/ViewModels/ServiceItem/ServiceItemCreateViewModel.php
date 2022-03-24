<?php

namespace App\ViewModels\ServiceItem;

use App\Base\BaseViewModel;
use App\Dto\ServiceItemDto;
use App\ViewModels\Price\PriceCreateViewModel;

class ServiceItemCreateViewModel extends PriceCreateViewModel
{
    public function model()
    {
        return new ServiceItemDto($this->data);
    }
}
