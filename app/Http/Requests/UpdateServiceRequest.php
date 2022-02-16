<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\ServiceDto;
use App\Interfaces\DtoInterface;

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
            'title' => ['nullable', 'string'],
            'description' => ['nullable', 'string']
        ];
    }

    public function getData(): DtoInterface
    {
        return new ServiceDto($this->all());
    }
}
