<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Models\Service;
use App\Models\ServiceId;

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

    public function createItemIds(array $data): bool
    {
        return ServiceId::insert($data);
    }

    public function deleteItemIds(int $servic_id)
    {
        ServiceId::where('service_id', $servic_id)->delete();
    }
    
}