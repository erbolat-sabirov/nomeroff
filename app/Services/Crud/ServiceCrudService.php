<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Models\Service;

class ServiceCrudService extends BaseCrud
{
    
    public $modelClass = Service::class;
}