<?php

namespace App\Dto;

use App\Base\BaseDto;

class ServiceDto extends BaseDto
{

    public $title;
    public $description;

    public function dbData(): array
    {
        $data = [
            'title' => $this->title,
            'description' => $this->description
        ];

        return del_arr_elem_if_null($data);
    }
}