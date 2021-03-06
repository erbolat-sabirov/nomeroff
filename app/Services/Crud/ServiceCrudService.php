<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Models\Service;
use App\Models\ServiceId;

class ServiceCrudService extends BaseCrud
{

    public $modelClass = Service::class;

    public function createItemIds(array $data): bool
    {
        return ServiceId::insert($data);
    }

    public function deleteItemIds(int $servic_id)
    {
        ServiceId::where('service_id', $servic_id)->delete();
    }

    public function doesntHaveCarTypes()
    {
        return $this->query()->whereDoesntHave('serviceCarTypes')->get();
    }

}
