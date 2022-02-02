<?php

namespace App\Dto;

use App\Base\BaseDto;

class CarDto extends BaseDto
{

    public $number;
    public $zone;
    public $phone;
    public $brand;
    public $name;

    public function dbData(): array
    {
        $data = [
            'number' => $this->number,
            'zone' => $this->zone,
            'phone' => $this->phone,
            'brand' => $this->brand,
            'name' => $this->name,
        ];

        return del_arr_elem_if_null($data);
    }
}