<?php

namespace Database\Seeders;

use App\Helpers\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Roles::permissions() as $key => $permissions) {
            foreach ($permissions as $pkey => $permission) {
                Permission::findOrCreate($key . '_' . $permission);
            }
        }
    }
}
