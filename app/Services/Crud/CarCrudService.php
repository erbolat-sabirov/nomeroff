<?php

namespace App\Services\Crud;

use App\Base\BaseCrud;
use App\Dto\CarDto;
use App\Models\Car;

class CarCrudService extends BaseCrud
{
    

    public $modelClass = Car::class;


    public function exists(string $number, string $zone = 'ru'): bool
    {
        $res = $this->query()->where('number', $number)->where('zone', $zone)->exists();

        return $res;
    }

}