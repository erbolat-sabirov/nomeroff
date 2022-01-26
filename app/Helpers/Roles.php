<?php

namespace App\Helpers;

class Roles
{
    const ROLE_SUPER_ADMIN = 'SUPERADMIN';
    const ROLE_MANAGER = 'MANAGER';

    public static function list(): array
    {
        return [
            self::ROLE_SUPER_ADMIN,
            self::ROLE_MANAGER
        ];
    }

    public static function names(): array
    {
        return [
            self::ROLE_SUPER_ADMIN => 'Super Admin',
            self::ROLE_MANAGER => 'Manager'
        ];
    }

    public static function permissions(): array
    {
        return [
            'user' => [
                'view',
                'save'
            ],
            'category' => [
                'view',
                'save'
            ]
        ];
    }
}