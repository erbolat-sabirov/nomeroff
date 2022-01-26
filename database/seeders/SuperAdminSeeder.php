<?php

namespace Database\Seeders;

use App\Helpers\Roles;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;
use Str;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $username = 'Super Admin';
        $hasSuperAdmin = User::where('name',$username)->exists();

        if (!$hasSuperAdmin) {
            $user = User::create([
                'name' => $username,
                'email' => 'super@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('superadmin'),
                'remember_token' => Str::random(10),
            ]);

            $user->assignRole(Roles::ROLE_SUPER_ADMIN);
        }
    }
}
