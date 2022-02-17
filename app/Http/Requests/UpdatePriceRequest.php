<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\PriceDto;
use App\Interfaces\DtoInterface;

class UpdatePriceRequest extends BaseRequest
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
            'model' => [
                'required',
                'string'
            ]
        ];
    }

    public function getData(): DtoInterface
    {
        $data = $this->all();
        $data['service_id'] = $this->route('service_price')->id;
        return new PriceDto($data);
    }
}
