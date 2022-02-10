<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Models\CarBrand;

class CarBrandCrudService extends BaseCrud
{
    

    public $modelClass = CarBrand::class;
}