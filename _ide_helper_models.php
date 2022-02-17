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
 * @property-read \App\Models\CarModel|null $model
 * @property-read \App\Models\CarType|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Washing[] $washings
 * @property-read int|null $washings_count
 * @property int|null $car_type_id
 * @property int|null $car_brand_id
 * @property int|null $car_model_id
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCarBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCarModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCarTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDescription($value)
 * @property-read \App\Models\CarBrand|null $carBrand
 * @property-read \App\Models\CarModel|null $carModel
 * @property-read \App\Models\CarType|null $carType
 */
	class Car extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarBrand
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 * @method static \Database\Factories\CarBrandFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarBrand whereUpdatedAt($value)
 */
	class CarBrand extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarModel
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 * @method static \Database\Factories\CarModelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereUpdatedAt($value)
 */
	class CarModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarType
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 * @method static \Database\Factories\CarTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|CarType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarType query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CarType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarType whereUpdatedAt($value)
 * @property-read \App\Models\Price|null $price
 */
	class CarType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Price
 *
 * @method static \Database\Factories\PriceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Price query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $amount
 * @property int $priceable_id
 * @property string $priceable_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $priceable
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePriceableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price wherePriceableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Price whereUpdatedAt($value)
 */
	class Price extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ServiceItem[] $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Price|null $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Washing[] $washings
 * @property-read int|null $washings_count
 * @method static \Database\Factories\ServiceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ServiceId
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceId newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceId newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceId query()
 * @mixin \Eloquent
 * @property int $service_id
 * @property int $service_item_id
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceId whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceId whereServiceItemId($value)
 * @method static \Database\Factories\ServiceIdFactory factory(...$parameters)
 */
	class ServiceId extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ServiceItem
 *
 * @method static \Database\Factories\ServiceItemFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Price|null $price
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceItem whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Service[] $services
 * @property-read int|null $services_count
 */
	class ServiceItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ServiceCarType
 *
 * @method static \Database\Factories\ServiceCarTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceCarType query()
 */
	class ServiceCarType extends \Eloquent {}
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
 * @property-read \App\Models\Car|null $car
 * @property-read \App\Models\Service|null $service
 * @method static \Database\Factories\WashingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel filter($filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Washing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Washing query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $car_id
 * @property int|null $service_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Washing whereUpdatedAt($value)
 */
	class Washing extends \Eloquent {}
}

