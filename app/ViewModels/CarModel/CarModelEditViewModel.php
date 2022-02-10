<?php

namespace App\ViewModels\CarModel;

use App\Base\BaseViewModel;
use App\Dto\CarModelDto;

class CarModelEditViewModel extends BaseViewModel
{

    public function model()
    {
        return new CarModelDto($this->data ?: $this->model->toArray());
    }
}
