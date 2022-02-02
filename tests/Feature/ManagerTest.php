<?php

namespace Tests\Feature;

use App\Helpers\Roles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ManagerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_manager_without_auth_index()
    {
        $response = $this->get(route('managers.index'));

        $response->assertStatus(302);
    }

    public function test_manager_with_auth_index()
    {
        $user = User::factory()->create();
        $permission = Permission::create(['name' => 'user_viewAny']);
        Role::create(['name' => Roles::ROLE_MANAGER]);
        $user->givePermissionTo(['user_viewAny']);
        $this->actingAs($user);

        $response = $this->get(route('managers.index'));

        $response->assertStatus(200);
    }

    public function test_manager_create()
    {
        $user = User::factory()->create();
        Role::create(['name' => Roles::ROLE_SUPER_ADMIN]);
        $user->assignRole(Roles::ROLE_SUPER_ADMIN);
        $this->actingAs($user);
        
        $response = $this->get(route('managers.create'));

        $response->assertStatus(200);
    }

    public function test_manager_store()
    {
        $user = User::factory()->create();
        Role::create(['name' => Roles::ROLE_SUPER_ADMIN]);
        Role::create(['name' => Roles::ROLE_MANAGER]);
        $user->assignRole(Roles::ROLE_SUPER_ADMIN);
        $this->actingAs($user);

        $response = $this->post(route('managers.store'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => Roles::ROLE_MANAGER,
        ]);

        $response->assertRedirect(route('managers.index'));
    }

    public function test_manager_edit()
    {
        $user = User::factory()->create();
        Role::create(['name' => Roles::ROLE_SUPER_ADMIN]);
        $user->assignRole(Roles::ROLE_SUPER_ADMIN);
        $this->actingAs($user);
        
        $manager = User::factory()->create();

        $response = $this->get(route('managers.edit', $manager));

        $response->assertStatus(200);
    }

    public function test_manager_update()
    {
        $user = User::factory()->create();
        Role::create(['name' => Roles::ROLE_SUPER_ADMIN]);
        Role::create(['name' => Roles::ROLE_MANAGER]);
        $user->assignRole(Roles::ROLE_SUPER_ADMIN);
        $this->actingAs($user);

        $manager = User::factory()->create([
            'email' => 'test@example.com'
        ]);
        
        $manager->assignRole(Roles::ROLE_MANAGER);

        $response = $this->put(route('managers.update', $manager), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('managers.index'));
    }

    public function test_manager_update_validate_email()
    {
        $user = User::factory()->create();
        Role::create(['name' => Roles::ROLE_SUPER_ADMIN]);
        Role::create(['name' => Roles::ROLE_MANAGER]);
        $user->assignRole(Roles::ROLE_SUPER_ADMIN);

        $manager = User::factory()->create([
            'email' => 'test@example.com'
        ]);

        User::factory()->create([
            'email' => 'test1@example.com'
        ]);
        
        $manager->assignRole(Roles::ROLE_MANAGER);

        $response = $this->actingAs($user)->put(route('managers.update', $manager), [
            'name' => 'Test User',
            'email' => 'test1@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $response->assertSessionHasErrors([
            'email' => 'The email has already been taken.'
        ]);
        $response->assertStatus(302);
    }
}
