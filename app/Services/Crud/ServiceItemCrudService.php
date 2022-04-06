<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Models\ServiceItem;

class ServiceItemCrudService extends BaseCrud
{
    
    public $modelClass = ServiceItem::class;

    

    public function doesntHaveCarTypes()
    {
        return $this->query()->whereDoesntHave('serviceCarTypes')->get();
    }
}