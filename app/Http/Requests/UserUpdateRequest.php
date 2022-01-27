<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\UserDto;
use App\Interfaces\DtoInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserUpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ];
    }

    public function getData(): DtoInterface
    {
        return new UserDto($this->all());
    }
}
