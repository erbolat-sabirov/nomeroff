<?php

namespace App\ViewModels\CarBrand;

use App\Base\BaseViewModel;
use App\Dto\CarBrandDto;

class CarBrandCreateViewModel extends BaseViewModel
{

    public function model()
    {
        return new CarBrandDto($this->data);
    }
}
