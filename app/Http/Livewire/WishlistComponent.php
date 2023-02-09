<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function store($product_id, $product_title, $product_price){
        Cart::instance('cart')->add($product_id, $product_title, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Товар додано у Кошик');
        return redirect()->route('product.cart');
    }

    public function destroy($rowId){
        Cart::instance('wishlist')->remove($rowId);
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    public function destroyAll(){
        Cart::instance('wishlist')->destroy();
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
