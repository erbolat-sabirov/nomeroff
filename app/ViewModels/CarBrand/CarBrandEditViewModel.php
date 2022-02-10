<?php

namespace App\ViewModels\CarBrand;

use App\Base\BaseViewModel;
use App\Dto\CarBrandDto;
use Spatie\ViewModels\ViewModel;

class CarBrandEditViewModel extends BaseViewModel
{

    public function model()
    {
        return new CarBrandDto($this->data ?: $this->model->toArray());
    }
}
