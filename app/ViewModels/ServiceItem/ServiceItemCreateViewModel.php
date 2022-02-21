<?php

namespace App\ViewModels\CarType;

use App\Base\BaseViewModel;
use App\Dto\ServiceItemDto;

class ServiceItemCreateViewModel extends BaseViewModel
{
    public function model()
    {
        return new ServiceItemDto($this->data);
    }
}
