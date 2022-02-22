<?php

namespace App\ViewModels\Washing;

use App\Base\BaseViewModel;
use App\Dto\WashingDto;

class WashingCreateViewModel extends BaseViewModel
{

    public function model()
    {
        return new WashingDto($this->data);
    }

    
}
