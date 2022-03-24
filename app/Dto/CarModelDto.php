<?php

namespace App\Dto;

use App\Base\BaseDto;

class CarModelDto extends BaseDto
{
    public $title;
    public $car_brand_id;
    public $car_type_id;

    public function dbData(): array
    {
        $data = [
            'title' => $this->title,
            'car_brand_id' => $this->car_brand_id,
            'car_type_id' => $this->car_type_id
        ];

        return del_arr_elem_if_null($data);
    }
}
