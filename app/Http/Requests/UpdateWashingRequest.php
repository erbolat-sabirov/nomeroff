<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\WashingDto;
use App\Interfaces\DtoInterface;
use App\Models\Car;
use App\Models\Service;
use App\Models\Washing;
use Illuminate\Foundation\Http\FormRequest;

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
            'car_id' => [
                'required',
                'integer',
                'exists:' . Car::class . ',id'
            ],
            'service_id' => [
                'nullable',
                'integer',
                'exists:' . Service::class . ',id'
            ],
            'statis' => [
                'required',
                'string',
                'in:' . implode(',', Washing::getStatusKeysList())
            ],
            'service_items.*.service_item_id' => [
                'nullable',
                'integer',
                'exists:' . ServiceItem::class . ',id'
            ]
        ];
    }

    public function getData(): DtoInterface
    {
        return new WashingDto($this->all());
    }
}
