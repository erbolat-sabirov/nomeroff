<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\CarBrandDto;
use App\Interfaces\DtoInterface;

class UpdateCarBrandRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
        return new CarBrandDto($this->all());
    }
}
