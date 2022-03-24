<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\ServiceDto;
use App\Interfaces\DtoInterface;
use App\Models\ServiceItem;

class UpdateServiceRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'price.types' => [
                'required',
                'array',
            ],
            'price.types.*.amount' => [
                'required',
                'numeric'
            ],
            'price.model' => [
                'required',
                'string'
            ],
            'price.service_items' => [
                'nullable',
                'array'
            ],
            'price.service_items.*.id' => [
                'nullable',
                'integer',
                'exists:' . ServiceItem::class . ',id'
            ]
        ];
    }

    public function getData(): ServiceDto
    {
        return new ServiceDto($this->all());
    }
}
