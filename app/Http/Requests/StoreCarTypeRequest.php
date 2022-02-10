<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\CarTypeDto;
use App\Interfaces\DtoInterface;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarTypeRequest extends BaseRequest
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
        return new CarTypeDto($this->all());
    }
}
