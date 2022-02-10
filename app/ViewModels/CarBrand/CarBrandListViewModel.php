<?php

namespace App\ViewModels\CarBrand;

use App\Base\BaseViewModel;
use Spatie\ViewModels\ViewModel;

class CarBrandListViewModel extends BaseViewModel
{
    
    public function models()
    {
        return $this->service->list($this->data);
    }
}
