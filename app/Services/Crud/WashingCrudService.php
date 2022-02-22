<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Dto\WashingDto;
use App\Models\Washing;

class WashingCrudService extends BaseCrud
{
    
    public $modelClass = Washing::class;

    public function createServiceItems(Washing $model, WashingDto $dto): Washing
    {
        if (!empty($dto->getServiceItems())) {
            $model->items()->createMany($dto->getServiceItems());
        }

        return $model;
    }

    public function deleteServiceItems(Washing $model)
    {
        return $model->items()->delete();
    }
}