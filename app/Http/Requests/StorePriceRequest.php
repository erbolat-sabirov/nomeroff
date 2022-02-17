<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\PriceDto;
use App\Interfaces\DtoInterface;
use Illuminate\Foundation\Http\FormRequest;

class StorePriceRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'types' => [
                'required',
                'array',
            ],
            'types.*.amount' => [
                'required',
                'numeric'
            ],
            'service_id' => [
                'required',
                'integer'
            ],
            'model' => [
                'required',
                'string'
            ]
        ];
    }

    public function getData(): DtoInterface
    {
        return new PriceDto($this->all());
    }

}
