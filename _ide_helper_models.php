<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Car
 *
 * @property int $id
 * @property string $number
 * @property string $zone
 * @property string|null $phone
 * @property string|null $brand
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CarFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car query()
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereZone($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CarService[] $carServices
 * @property-read int|null $car_services_count
 */
	class Car extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarBrand
 *
 * @method static \Database\Factories\CarBrandFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand query()
 */
	class CarBrand extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarModel
 *
 * @method static \Database\Factories\CarModelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel query()
 */
	class CarModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarService
 *
 * @property int $id
 * @property int $car_id
 * @property int|null $service_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CarServiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarService query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarService whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Car $car
 * @property-read \App\Models\Service|null $service
 */
	class CarService extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarType
 *
 * @method static \Database\Factories\CarTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CarType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarType query()
 */
	class CarType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Price
 *
 * @method static \Database\Factories\PriceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price query()
 */
	class Price extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $title
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ServiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ServiceItem
 *
 * @method static \Database\Factories\ServiceItemFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem query()
 */
	class ServiceItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|User filter($filter)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Washing
 *
 * @method static \Database\Factories\WashingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Washing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Washing query()
 */
	class Washing extends \Eloquent {}
}

