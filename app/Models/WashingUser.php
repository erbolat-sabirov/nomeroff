<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Filters\WashingFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WashingUser
 *
 * @method static \Database\Factories\WashingUserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|WashingUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WashingUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WashingUser query()
 * @mixin \Eloquent
 */
class WashingUser extends BaseModel
{

    public $timestamps = false;

    public function queryFilterClass(): string
    {
        return WashingFilter::class;
    }
}
