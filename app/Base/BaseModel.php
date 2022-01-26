<?php

namespace App\Base;

use App\Traits\FilterableTrait;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    use FilterableTrait;

    protected $guarded = [];

    abstract public function queryFilterClass(): string;
}