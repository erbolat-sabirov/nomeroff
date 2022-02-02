<?php

namespace App\Providers;

use App\Helpers\Roles;
use App\Models\Car;
use App\Models\CarService;
use App\Models\Service;
use App\Models\User;
use App\Policies\CarPolicy;
use App\Policies\CarServicePolicy;
use App\Policies\ServicePolicy;
use App\Policies\UserPolicy;
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
        CarService::class => CarServicePolicy::class,
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
