<?php

namespace App\ViewModels\CarModel;

use App\Base\BaseViewModel;
use App\Dto\CarModelDto;

class CarModelCreateViewModel extends BaseViewModel
{

    public function model()
    {
        return new CarModelDto($this->data);
    }
}
