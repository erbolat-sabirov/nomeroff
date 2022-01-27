<?php

namespace App\Base;

use App\Traits\FilterableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    use FilterableTrait, HasFactory;

    protected $guarded = [];

    abstract public function queryFilterClass(): string;
}