<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\WashingDto;
use App\Interfaces\DtoInterface;
use App\Models\Car;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Models\Washing;

class UpdateWashingRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service_id' => [
                'nullable',
                'integer',
                'exists:services,id'
            ],
            'status' => [
                'required',
                'string',
                'in:' . implode(',', Washing::getStatusKeysList())
            ],
            'service_items' => [
                'nullable',
                'array'
            ],
            'service_items.*.service_item_id' => [
                'nullable',
                'integer',
                'exists:service_items,id'
            ],
            'washing_users' => [
                'required',
                'array'
            ],
            'washing_users.*.user_id' => [
                'required',
                'integer',
                'exists:users,id'
            ]
        ];
    }

    public function getData(): DtoInterface
    {
        return new WashingDto($this->all());
    }
}
