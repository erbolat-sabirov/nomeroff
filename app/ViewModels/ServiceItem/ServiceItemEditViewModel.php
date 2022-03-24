<?php

namespace App\ViewModels\ServiceItem;

use App\Base\BaseViewModel;
use App\Dto\ServiceItemDto;
use App\ViewModels\Price\PriceEditViewModel;

class ServiceItemEditViewModel extends PriceEditViewModel
{

    public function model()
    {
        return new ServiceItemDto($this->data ?: $this->model->toArray());
    }
}
