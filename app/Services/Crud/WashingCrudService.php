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

    public function createWashedUsers(WashingDto $dto, Washing $washing): bool
    {
        $data = [];
        foreach ($dto->getUsers() as $key => $user) {
            $data[] = ['washing_id' => $washing->id, 'user_id' => $user['id']];
        }
        return WashingUser::insert($data);
    }
}