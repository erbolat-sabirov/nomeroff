<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\CarDto;
use App\Interfaces\DtoInterface;

class UpdateCarRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'car_type_id' => [
                'required',
                'integer',
                'exists:App\Models\CarType,id'
            ],
            'car_brand_id' => [
                'required',
                'integer',
                'exists:App\Models\CarBrand,id'
            ],
            'car_model_id' => [
                'required',
                'integer',
                'exists:App\Models\CarModel,id'
            ],
            'number' => [
                'required',
                'string'
            ],
            'zone' => [
                'required',
                'string'
            ],
            'phone' => [
                'required',
                'string'
            ],
            'description' => [
                'required',
                'string'
            ],
            'full_name' => [
                'required',
                'string'
            ],
        ];
    }

    public function getData(): DtoInterface
    {
        return new CarDto($this->all());
    }
}
