<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WashingTime extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function washing()
    {
        return $this->belongsTo(Washing::class);
    }
}
