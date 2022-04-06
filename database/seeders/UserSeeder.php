<?php

namespace Database\Seeders;

use App\Helpers\Roles;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = \App\Models\User::factory(1)->create([
        //     'name' => 'superadmin',
        //     'email' => 'super@admin.com',
        //     'password' => 'superadmin'
        // ]);
        // $user->assignRole(Roles::ROLE_SUPER_ADMIN);

        $users = \App\Models\User::factory(10)->create();
        foreach ($users as $key => $user) {
            if ($key == 1) {
                $user->assignRole(Roles::ROLE_SUPER_ADMIN);
            }
            $user->assignRole(Roles::ROLE_MANAGER);
        }
    }
}
