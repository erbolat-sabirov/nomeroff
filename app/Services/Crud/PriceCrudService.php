<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Models\Price;

class PriceCrudService extends BaseCrud
{
    
    public $modelClass = Price::class;
}