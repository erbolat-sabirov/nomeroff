<?php

namespace Tests\Feature\Http\Controller;

use App\Dto\PriceDto;
use App\Helpers\Roles;
use App\Models\CarType;
use App\Models\Service;
use App\Models\ServiceId;
use App\Models\ServiceItem;
use App\Models\User;
use App\Services\Crud\PriceCrudService;
use App\Services\Crud\ServiceCarTypeCrudService;
use App\Services\Crud\ServiceCrudService;
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
        $serviceItems = ServiceItem::factory(5)->create();
        
        $serviceItemsIds = [];

        foreach ($serviceItems as $key => $item) {
            $serviceItemsIds[]['id'] = $item->id; 
        }

        $typesAmounts = [];
        
        foreach ($types as $key => $type) {
            $typesAmounts[$type->id]['amount'] = $this->faker->randomNumber(5);
        }
        $response = $this->post(route('service-prices.store'), [
            'service_id' => $service[0]['id'],
            'types' => $typesAmounts,
            'model' => Service::class,
            'service_items' => $serviceItemsIds
        ]);

        $lastItemIds = ServiceId::where('service_id', $service[0]['id'])
                                ->where('service_item_id', 5)
                                ->first();
        $count = ServiceId::where('service_id', $service[0]['id'])->count();
        $this->assertEquals(5, $count);
        $this->assertEquals($service[0]['id'], $lastItemIds->service_id);
        $response->assertStatus(302);
    }

    public function test_edit()
    {
        $service = Service::factory()->count(1)->create();
        $serviceItems = ServiceItem::factory(5)->create();
        $service_price = $service[0];

        $serviceItemsIds = [];

        foreach ($serviceItems as $key => $item) {
            $serviceItemsIds[]['id'] = $item->id; 
        }

        $types = CarType::factory()->count(10)->create();
        $typesAmounts = [];
        
        foreach ($types as $key => $type) {
            $typesAmounts[$type->id]['amount'] = $this->faker->randomNumber(5);
        }

        $dto = new PriceDto([
            'service_id' => $service_price['id'],
            'types' => $typesAmounts,
            'model' => Service::class,
            'service_items' => $serviceItemsIds
        ]);
        $serviceCarTypes = app(ServiceCarTypeCrudService::class)->createMany($dto->getTypesData());
        app(PriceCrudService::class)->createMany($serviceCarTypes);
        app(ServiceCrudService::class)->createItemIds($dto->getServiceItemsData());

        $model = Service::where('id', $service_price->id)->first();
        $serviceCarTypes = $model->serviceCarTypes;

        $types = [];

        foreach ($serviceCarTypes as $key => $value) {
            $types[$value->carType->id]['amount'] = $value->price->id;
        }

        $service_items = [];

        foreach ($model->items as $key => $item) {
            $service_items[$item->service_item_id]['id'] = $item->service_item_id;
        }

        $newDto = new PriceDto([
            'model' => Service::class,
            'service_id' => $model->id,
            'types' => $types,
            'service_items' => $service_items
        ]);

        $response = $this->get(route('service-prices.edit', $service_price));

        $response->assertStatus(200);
        $response->assertViewHas('model', $newDto);
    }

    public function test_update()
    {
        $service = Service::factory()->count(1)->create();
        $serviceItems = ServiceItem::factory(5)->create();
        $service_price = $service[0];

        $serviceItemsIds = [];

        foreach ($serviceItems as $key => $item) {
            $serviceItemsIds[]['id'] = $item->id; 
        }

        $types = CarType::factory()->count(10)->create();
        $typesAmounts = [];
        
        foreach ($types as $key => $type) {
            $typesAmounts[$type->id]['amount'] = $this->faker->randomNumber(5);
        }
        $dto = new PriceDto([
            'service_id' => $service_price['id'],
            'types' => $typesAmounts,
            'model' => Service::class,
            'service_items' => $serviceItemsIds
        ]);
        $serviceCarTypes = app(ServiceCarTypeCrudService::class)->createMany($dto->getTypesData());
        app(PriceCrudService::class)->createMany($serviceCarTypes);
        app(ServiceCrudService::class)->createItemIds($dto->getServiceItemsData());

        $update_data = [];
        foreach ($typesAmounts as $type_id => $amount) {
            $update_data[$type_id]['amount'] = $this->faker->randomNumber(5);
        }

        $serviceItems = ServiceItem::factory(5)->create();
        $serviceItemsIds = [];

        foreach ($serviceItems as $key => $item) {
            $serviceItemsIds[]['id'] = $item->id; 
        }

        $response = $this->put(route('service-prices.update', $service_price), [
            'types' => $update_data,
            'model' => Service::class,
            'service_items' => $serviceItemsIds
        ]);

        $lastItemIds = ServiceId::where('service_id', $service_price['id'])
                                ->where('service_item_id', $serviceItems->last()->id)
                                ->first();
        $count = ServiceId::where('service_id', $service_price['id'])->count();
        $this->assertEquals(5, $count);
        $this->assertEquals($service_price['id'], $lastItemIds->service_id);

        $response->assertStatus(302);
        
        $response->assertSessionHas('success', 'Price update success');
    }
}
