<?php

namespace App\Providers;

use App\Helpers\Roles;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\Price;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Models\User;
use App\Models\Washing;
use App\Policies\CarBrandPolicy;
use App\Policies\CarModelPolicy;
use App\Policies\CarPolicy;
use App\Policies\CarTypePolicy;
use App\Policies\PricePolicy;
use App\Policies\ServiceItemPolicy;
use App\Policies\ServicePolicy;
use App\Policies\UserPolicy;
use App\Policies\WashingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Service::class => ServicePolicy::class,
        Car::class => CarPolicy::class,
        CarBrand::class => CarBrandPolicy::class,
        CarModel::class => CarModelPolicy::class,
        CarType::class => CarTypePolicy::class,
        Price::class => PricePolicy::class,
        ServiceItem::class => ServiceItemPolicy::class,
        Washing::class => WashingPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function($user, $ability){
            return $user->hasRole(Roles::ROLE_SUPER_ADMIN) ? true : null;
        });
    }
}
