<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Models\Service;

class ServiceCrudService extends BaseCrud
{
    
    public $modelClass = Service::class;

    public function list(array $data = [])
    {
        $models = $this->query()
                    ->filter($data)
                    ->with(['serviceCarType'])
                    ->paginate();
        return $models;
    }

    public function all()
    {
        $models = $this->query()->get();

        return $models;
    }
    
}