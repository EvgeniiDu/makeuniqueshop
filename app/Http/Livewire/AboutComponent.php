<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class AboutComponent extends Component
{
    public function store($product_id, $product_title, $product_price){
        Cart::instance('cart')->add($product_id, $product_title, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Товар додано у Кошик');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        return view('livewire.about-component')->layout('layouts.base');
    }
}
