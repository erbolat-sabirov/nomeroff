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

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        Role::create(['name' => Roles::ROLE_SUPER_ADMIN]);
        $user->assignRole(Roles::ROLE_SUPER_ADMIN);
        $this->actingAs($user);
        Role::create(['name' => Roles::ROLE_MANAGER]);
    }

    public function test_manager_with_auth_index()
    {
        $user = User::factory()->create();
        Permission::create(['name' => 'user_viewAny']);
        $user->givePermissionTo(['user_viewAny']);
        $this->actingAs($user);

        $response = $this->get(route('managers.index'));

        $response->assertStatus(200);
    }

    public function test_manager_create()
    {
        $response = $this->get(route('managers.create'));

        $response->assertStatus(200);
    }

    public function test_manager_store()
    {
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
        $manager = User::factory()->create();
        $response = $this->get(route('managers.edit', $manager));

        $response->assertStatus(200);
    }

    public function test_manager_update()
    {
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
        $manager = User::factory()->create([
            'email' => 'test@example.com'
        ]);
        User::factory()->create([
            'email' => 'test1@example.com'
        ]);
        $manager->assignRole(Roles::ROLE_MANAGER);

        $response = $this->put(route('managers.update', $manager), [
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

    public function test_manager_destroy()
    {
        $manager = User::factory()->create();

        $response = $this->delete(route('managers.destroy', $manager));
        $response->assertSessionHas('success', 'Success deleted');
        $response->assertStatus(302);
    }
}
