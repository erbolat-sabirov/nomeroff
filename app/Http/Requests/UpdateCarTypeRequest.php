<?php

namespace App\Http\Requests;

use App\Base\BaseDto;
use App\Dto\CarTypeDto;
use App\Interfaces\DtoInterface;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCarTypeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string'
            ]
        ];
    }

    public function getData(): DtoInterface
    {
        return new CarTypeDto($this->all());
    }
}
