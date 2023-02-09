<?php

namespace App\Http\Livewire;

use App\Models\Color;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class CartComponent extends Component
{

    public function increaseQty($rowId){
       $product = Cart::instance('cart')->get($rowId);
       $quantity = $product->qty + 1;
       Cart::instance('cart')->update($rowId, $quantity);
       $this->emitTo('cart-count-component', 'refreshComponent');
    }

    public function decreaseQty($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $quantity = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $quantity);
        $this->emitTo('cart-count-component', 'refreshComponent');
    }


    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success_message', 'Товар видалено');
    }

    public function destroyAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component', 'refreshComponent');
        session()->flash('success_message', 'Кошик очищено');
    }

    public function checkout(){
        if(Auth::check()){
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout(){
        if(Cart::instance('cart')->count() > 0){
            session()->put('checkout', [
                'subtotal' => Cart::instance('cart')->subtotal()
            ]);
        }
    }

    public function render()
    {
        //dd(Cart::instance('cart')->content());
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
