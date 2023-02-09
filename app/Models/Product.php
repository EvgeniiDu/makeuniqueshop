<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Kyslik\ColumnSortable\Sortable;
use KyslikColumnSortableSortable;

class Product extends Model
{
    use HasFactory, Sortable;
    protected $table = 'products';

    public $sortable = ['title', 'regular_price', 'updated_at'];

    public function category(){
     return   $this->belongsTo(Category::class);
    }

    public function color(){
        return   $this->belongsTo(Color::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
         $filter->apply($builder);
    }
}
