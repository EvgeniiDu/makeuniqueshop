<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
class OfferedProductsComponent extends Component
{
    public function store($product_id, $product_title, $product_price){
        Cart::instance('cart')->add($product_id, $product_title, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Товар додано у Кошик');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $products = Product::inRandomOrder()->limit(8)->get();
        return view('livewire.offered-products-component', ['products' => $products]);
    }
}
