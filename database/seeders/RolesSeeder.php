<?php

namespace Database\Seeders;

use App\Helpers\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Roles::list() as $key => $role) {
            Role::findOrCreate($role);
        }
    }
}
