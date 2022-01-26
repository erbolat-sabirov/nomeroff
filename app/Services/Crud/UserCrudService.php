<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Models\User;

class UserCrudService extends BaseCrud
{
    
    public $modelClass = User::class;
    
}