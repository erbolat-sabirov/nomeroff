<?php

namespace App\Dto;

use App\Base\BaseDto;
use Hash;

class UserDto extends BaseDto
{

    public $name;
    public $email;
    public $password;


    public function dbData(): array
    {
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ];

        return del_arr_elem_if_null($data);
    }
}