<?php

namespace App\Filters;

class ProductFilter extends QueryFilter
{
    public function category($values){
        return $this->builder->whereIn('category_id', $this->paramToArray($values));
    }
    public function prices($values){
        return $this->builder->whereBetween('regular_price', [$values['from'], $values['to']]);
    }
    public function sales(){
       return $this->builder->whereNotNull('sale_price');
    }
    public function topSale(){
       return $this->builder->where('top_sales', 1);
    }
    public function newProduct($value){
        return $this->builder->where('new_product', $value);
    }
    public function new(){
        return $this->builder->where('new', 1);
    }
    public function instock($value){
        return $this->builder->where('stock_status', $value);
    }
    public function material($values){
       return $this->builder->whereIn('material', $this->paramToArray($values));
    }

    public function color($values){
        return $this->builder->whereIn('color_id', $this->paramToArray($values));
    }
}
