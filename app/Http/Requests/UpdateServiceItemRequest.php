<?php

namespace App\Http\Requests;

use App\Base\BaseDto;
use App\Interfaces\DtoInterface;
use App\Dto\ServiceItemDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return \string[][]
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
        return new ServiceItemDto($this->all());
    }
}
