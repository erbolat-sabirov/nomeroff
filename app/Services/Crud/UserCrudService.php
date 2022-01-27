<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Interfaces\DtoInterface;
use App\Models\User;

class UserCrudService extends BaseCrud
{
    
    public $modelClass = User::class;
    
    public function createWithRole(DtoInterface $dto, string $role)
    {
        $user = parent::create($dto);
        $user->assignRole($role);

        return $user;
    }
}