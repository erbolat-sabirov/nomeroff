<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Models\CarType;

class CarTypeCrudService extends BaseCrud
{
    
    public $modelClass = CarType::class;

    
}