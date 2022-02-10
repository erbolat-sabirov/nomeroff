<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Models\CarModel;

class CarModelCrudService extends BaseCrud
{
    
    public $modelClass = CarModel::class;
}