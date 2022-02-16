<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\CarModelDto;
use App\Interfaces\DtoInterface;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarModelRequest extends BaseRequest
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
            ],
            'car_brand_id' => [
                'nullable',
                'integer',
                'exists:App\Models\CarBrand,id'
            ]
        ];
    }

    public function getData(): DtoInterface
    {
        return new CarModelDto($this->all());
    }
}
