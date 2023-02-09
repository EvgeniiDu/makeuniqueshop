<?php

namespace App\Http\Livewire;

use App\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;

    public $search;
    public $sorting;

    public function mount(){
        $this->sorting = 'За замовчуванням';
        $this->fill(request()->only('search'));

    }

    public $filter = [
        'categories' => [],
    ];

    protected $updatesQueryString = ['filter'];

    public function render()
    {
        $products_search = Product::where('title', 'like', '%'.$this->search.'%');
        $categories_id =$products_search->pluck('category_id')->unique()->values()->all();
        $categories =  Category::whereIn('id', $categories_id)->get();
        $products = $products_search->sortable([$this->sorting])->when($this->sorting == 'price-desc', function ($d){
            $d->orderBy('regular_price', 'desc');
        })->when($this->filter['categories'], function ($c){
            $c->whereIn('category_id', $this->filter['categories']);
        })->paginate(6);

        return view('livewire.search-component', ['products'=>$products,
            'categories'=>$categories, 'search' => $this->search])->layout('layouts.base');
    }
}
