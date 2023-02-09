<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class NewProductComponent extends Component
{
    use WithPagination;

    public function store($product_id, $product_title, $product_price){
        Cart::instance('cart')->add($product_id, $product_title, 1, $product_price)->associate('App\Models\Product');
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
        $products_new = Product::where('new_product', 'new')->paginate(6);
        return view('livewire.new-product-component', ['products_new' => $products_new])->layout('layouts.base');
    }
}
