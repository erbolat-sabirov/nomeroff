<?php

namespace Tests\Feature\Http\Controller;

use App\Dto\PriceDto;
use App\Helpers\Roles;
use App\Models\CarType;
use App\Models\Service;
use App\Models\User;
use App\Services\Crud\PriceCrudService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ServicePriceControllerTest extends TestCase
{

    use RefreshDatabase, WithFaker;


    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        Role::create(['name' => Roles::ROLE_SUPER_ADMIN]);
        $user->assignRole(Roles::ROLE_SUPER_ADMIN);
        $this->actingAs($user);
        Role::create(['name' => Roles::ROLE_MANAGER]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get(route('service-prices.index'));

        $response->assertStatus(200);
    }

    public function test_create()
    {
        $response = $this->get(route('service-prices.index'));

        $response->assertStatus(200);
    }

    public function test_store_validate()
    {
        $response = $this->post(route('service-prices.store'));

        $response->assertSessionHasErrors(['service_id', 'types', 'model']);

    }

    public function test_store()
    {
        $service = Service::factory()->count(1)->create();
        $types = CarType::factory()->count(10)->create();
        
        $typesAmounts = [];
        
        foreach ($types as $key => $type) {
            $typesAmounts[$type->id]['amount'] = $this->faker->randomNumber(5);
        }
        $response = $this->post(route('service-prices.store'), [
            'service_id' => $service[0]['id'],
            'types' => $typesAmounts,
            'model' => Service::class
        ]);

        $response->assertStatus(302);
    }

    public function test_update()
    {
        $service = Service::factory()->count(1)->create();

        $service_price = $service[0];
        $types = CarType::factory()->count(10)->create();
        $typesAmounts = [];
        
        foreach ($types as $key => $type) {
            $typesAmounts[$type->id]['amount'] = $this->faker->randomNumber(5);
        }
        $data = new PriceDto([
            'service_id' => $service_price['id'],
            'types' => $typesAmounts,
            'model' => Service::class
        ]);
        app(PriceCrudService::class)->createMany($data);

        $update_data = [];
        foreach ($typesAmounts as $type_id => $amount) {
            $update_data[$type_id]['amount'] = $this->faker->randomNumber(5);
        }

        $response = $this->put(route('service-prices.update', $service_price), [
            'types' => $update_data,
            'model' => Service::class
        ]);

        $response->assertStatus(302);
        
        $response->assertSessionHas('success', 'Price update success');
    }
}
