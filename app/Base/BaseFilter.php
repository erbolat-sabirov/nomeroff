<?php

namespace App\Base;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class BaseFilter
{

    protected Builder $builder;

    public function __construct(public Request|array $request)
    {
    }


    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->params() as $name => $value) {
            if (is_string($value) && trim($value) === '') {
                continue;
            } elseif (is_array($value) && empty($value)) {
                continue;
            } elseif ($value == null) {
                continue;
            } elseif (!method_exists($this, $name)) {
                continue;
            }

            $this->$name($value);
        }

        return $this->builder;
    }

    public function params()
    {
        return is_object($this->request) && $this->request instanceof Request ? $this->request->all() : $this->request;
    }
}
