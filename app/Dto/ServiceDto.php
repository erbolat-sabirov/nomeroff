<?php

namespace App\Dto;

use App\Base\BaseDto;

class ServiceDto extends BaseDto
{

    public $title;
    public $price;

    public function dbData(): array
    {
        $data = [
            'title' => $this->title,
            'price' => $this->price
        ];

        return del_arr_elem_if_null($data);
    }
}