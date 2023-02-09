<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use Cart;
class DiscountsComponent extends Component
{
    public function store($product_id, $product_title, $product_price){
        Cart::instance('cart')->add($product_id, $product_title, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Товар додано у Кошик');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $products_hot = Product::whereNotNull('sale_price')->get();
        $products_top = Product::where('top_sales', 1)->get();
        return view('livewire.discounts-component', ['products_hot' => $products_hot, 'products_top' => $products_top])->layout('layouts.base');
    }
}
