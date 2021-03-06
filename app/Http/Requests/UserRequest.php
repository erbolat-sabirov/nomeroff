<?php

namespace App\Http\Requests;

use App\Base\BaseRequest;
use App\Dto\UserDto;
use App\Helpers\Roles;
use App\Interfaces\DtoInterface;
use Illuminate\Validation\Rules\Password;

class UserRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['nullable', 'string', 'in:'. implode(',', Roles::list()) ]
        ];
    }

    public function getData(): DtoInterface
    {
        return new UserDto($this->all());
    }
}
