<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class PayShippingComponent extends Component
{
    public function render()
    {

        return view('livewire.pay-shipping-component')->layout('layouts.base');
    }
}
