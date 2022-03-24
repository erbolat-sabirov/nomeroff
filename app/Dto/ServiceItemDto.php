<?php

namespace App\Dto;

use App\Base\BaseDto;

class ServiceItemDto extends BaseDto
{

    public $title;
    public $price;
    
    public function dbData(): array
    {
        $data = [
            'title' => $this->title
        ];

        return del_arr_elem_if_null($data);
    }

    public function getPriceDto()
    {
        return new PriceDto($this->price);
    }
}