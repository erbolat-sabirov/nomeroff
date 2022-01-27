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
        $users = \App\Models\User::factory(10)->create();
        foreach ($users as $key => $user) {
            $user->assignRole(Roles::ROLE_MANAGER);
        }
    }
}
