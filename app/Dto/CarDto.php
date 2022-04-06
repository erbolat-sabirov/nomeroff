<?php

namespace App\Dto;

use App\Base\BaseDto;

class CarDto extends BaseDto
{

    public $car_type_id;
    public $car_brand_id;
    public $car_model_id;
    public $number;
    public $zone;
    public $phone;
    public $description;
    public $full_name;

    public function dbData(): array
    {
        $data = [
            'car_type_id' => $this->car_type_id,
            'car_brand_id' => $this->car_brand_id,
            'car_model_id' => $this->car_model_id,
            'number' => $this->number,
            'zone' => $this->zone,
            'phone' => $this->phone,
            'description' => $this->description,
            'full_name' => $this->full_name,
        ];

        return del_arr_elem_if_null($data);
    }
}