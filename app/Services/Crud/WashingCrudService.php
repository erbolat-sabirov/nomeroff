<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Dto\WashingDto;
use App\Models\Washing;
use App\Models\WashingUser;

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

    public function createWashingUsers(WashingDto $dto, Washing $model): Washing
    {

        if (!empty($dto->getUsers())) {
            $model->usersThrough()->createMany($dto->getUsers());
        }

        return $model;
    }

    public function deleteWashingUsers(Washing $model){
        return $model->items()->delete();
    }

    public function deleteRelations(Washing $model)
    {
        $this->deleteServiceItems($model);
        $this->deleteWashingUsers($model);
    }
}