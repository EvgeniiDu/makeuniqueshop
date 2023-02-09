<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $prodSlug;
    public $slug;
    public $color_title;
    public $color_image;
    public function mount($prodSlug, $slug=null){
        $this->prodSlug = $prodSlug;
        $this->slug = $slug;
        $product = Product::where('slug', $this->prodSlug)->first();
        $this->color_title = Color::where('id', $product->color_id)->pluck('title')->first();
    }

    public function store($product_id, $product_title, $product_price){
        $this->color_image = Color::where('title', $this->color_title)->pluck('image')->first();
        Cart::instance('cart')->add($product_id, $product_title, 1, $product_price, ['color_title' => $this->color_title, 'color_image' => $this->color_image])->associate('App\Models\Product');
        session()->flash('success_message', 'Товар додано у Кошик');
        return redirect()->route('product.cart');
    }

    public function addToWishlist($product_id, $product_title, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_title, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id){
        foreach (Cart::instance('wishlist')->content() as $wishItem){
            if($wishItem->id == $product_id){
                Cart::instance('wishlist')->remove($wishItem->rowId);
            }
        }
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }
    public function render()
    {
        $colors = Color::all();
        $product = Product::where('slug', $this->prodSlug)->first();
        if($this->slug == null){
            $category = Category::where('id', $product->category_id)->first();
        }else{
            $category = Category::where('slug', $this->slug)->first();
        }
        $images = Image::where('product_id', $product->id)->get();
        return view('livewire.details-component', ['product'=>$product, 'category' => $category, 'images' => $images, 'colors' => $colors])->layout('layouts.base');
    }
}
