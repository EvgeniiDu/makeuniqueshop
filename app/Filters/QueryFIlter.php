<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class QueryFilter
{
    protected $request;
    protected $builder;
    protected $delimiter = ',';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filters(){
        return $this->request->query();
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;
        foreach ($this->filters() as $field => $value) {
            if (method_exists($this, $field)) {
                call_user_func_array([$this, $field], array_filter([$value]));
            }
        }
        return $this->builder;
    }


    protected function paramToArray($param)
    {
        return explode($this->delimiter, implode($this->delimiter, $param));
    }
}
