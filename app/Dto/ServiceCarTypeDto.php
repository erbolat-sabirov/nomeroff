<?php

namespace App\Dto;

use App\Base\BaseDto;
use App\Interfaces\DtoInsertInterface;

class ServiceCarTypeDto extends BaseDto implements DtoInsertInterface
{

    public $car_type_id;
    public $serviceable_id;
    public $serviceable_type;
    public $types;

    public function dbData(): array
    {
        $data = [
            'car_type_id' => $this->car_type_id,
            'serviceable_id' => $this->serviceable_id,
            'serviceable_type' => $this->serviceable_type
        ];

        return del_arr_elem_if_null($data);
    }

    public function dbManyData(): array
    {
        $arr = [];
        foreach ($this->types as $key => $value) {
            $arr[] = [
                'car_type_id' => $key,
                'serviceable_id' => $this->serviceable_id,
                'serviceable_type' => $this->serviceable_type,
                'amount' => $value['amount']
            ];
        }

        return $arr;
    }
}