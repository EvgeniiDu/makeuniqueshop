<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function view;

class MyOrdersComponent extends Component
{
    public function destroy($order_id){
        Order::where('id', $order_id)->delete();
    }

    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        return view('livewire.user.my-orders-component', ['orders' => $orders])->layout('layouts.base');
    }
}
