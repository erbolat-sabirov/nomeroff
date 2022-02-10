<?php

namespace App\Dto;

use App\Base\BaseDto;

class CarBrandDto extends BaseDto
{
    
    public $title;

    public function dbData(): array
    {
        $data = [
            'title' => $this->title
        ];

        return del_arr_elem_if_null($data);
    }
}