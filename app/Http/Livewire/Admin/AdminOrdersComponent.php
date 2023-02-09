<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrdersComponent extends Component
{
    use WithPagination;

    public $search;

    public function updateOrderStatus($order_id, $order_status){
        $order = Order::find($order_id);
        $order->status = $order_status;
        if($order_status == 'доставлено'){
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }elseif ($order_status == 'відмінено') {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();

        session()->flash('success_message', 'Статус замовлення успішно змінено');
    }

    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->when($this->search, function ($s){
            $s->where('id', $this->search)->first();
        })->paginate(6);
        return view('livewire.admin.admin-orders-component', ['orders' => $orders])->layout('layouts.admin_layout');
    }
}
