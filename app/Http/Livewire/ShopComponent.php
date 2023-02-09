<?php

namespace App\Http\Livewire;

use App\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $slug;
    public $category;
    public $max_price = 50000;
    public $min_price = 500;

    public $filter = [
        'color' => [],
        'materials' => [],
        'instock' => '',
        'hotSale' => '',
        'topSale' => '',
        'newProduct' => '',
    ];

    public function mount($slug)
    {
        $this->sorting = 'За замовчуванням';
        $this->slug = $slug;
        $this->category = Category::where('slug', $this->slug)->first();
    }


    protected $updatesQueryString = ['filter'];

    public function store($product_id, $product_title, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_title, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Товар додано у Кошик');
        return redirect()->route('product.cart');
    }

    public function addToWishlist($product_id, $product_title, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_title, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $wishItem) {
            if ($wishItem->id == $product_id) {
                Cart::instance('wishlist')->remove($wishItem->rowId);
            }
        }
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    public function render()
    {
        $products = Product::where('category_id', $this->category->id)->sortable([$this->sorting])->when($this->sorting == 'price-desc', function ($d){
            $d->orderBy('regular_price', 'desc');
        })->when($this->filter['color'], function ($c) {
            return $c->whereIn('color_id', $this->filter['color']);
        })->when($this->filter['materials'], function ($c) {
            return $c->whereIn('material', $this->filter['materials']);
        })->when($this->filter['instock'], function ($c) {
            return $c->where('stock_status', $this->filter['instock']);
        })->when($this->filter['hotSale'], function ($h) {
            return $h->whereNotNull('sale_price');
        })->when($this->filter['topSale'], function ($t) {
            return $t->where('top_sales', 1);
        })->when($this->filter['newProduct'], function ($n) {
            return $n->where('new_product', 'new');
        })->when($this->filter['newProduct'], function ($n) {
            return $n->where('new_product', 'new');
        })->whereBetween('regular_price', [$this->min_price, $this->max_price])->paginate(6);

        $materials = Product::where('category_id', $this->category->id)->distinct()->pluck('material');
        $colors = Color::all();
        return view('livewire.shop-component', ['products' => $products, 'category' => $this->category,
            'materials' => $materials, 'colors' => $colors])->layout('layouts.base');
    }
}
