<?php

namespace App\ViewModels\CarType;

use App\Base\BaseViewModel;
use App\Dto\CarTypeDto;

class CarTypeEditViewModel extends BaseViewModel
{

    public function model()
    {
        return new CarTypeDto($this->data ?: $this->model->toArray());
    }
}
