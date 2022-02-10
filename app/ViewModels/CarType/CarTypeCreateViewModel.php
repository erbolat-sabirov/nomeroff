<?php

namespace App\ViewModels\CarType;

use App\Base\BaseViewModel;
use App\Dto\CarTypeDto;

class CarTypeCreateViewModel extends BaseViewModel
{
    public function model()
    {
        return new CarTypeDto($this->data);
    }
}
