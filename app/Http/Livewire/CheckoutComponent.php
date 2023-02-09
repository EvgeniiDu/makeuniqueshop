<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Cart;

class CheckoutComponent extends Component
{
    public $delivery_method;
    public $payment_method;
    public $lastname;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $province;
    public $department;
    public $thankyou;


    public function mount(){
        $this->delivery_method = 'address';
        $this->payment_method = 'готівкою';
        $this->lastname = Auth::user()->lastname;
        $this->name = Auth::user()->name;
        $this->phone = Auth::user()->phone;
        $this->email = Auth::user()->email;
    }

    public function updated($fields) {
        $this->validateOnly($fields, [
            'lastname' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'city' => 'required',
            'province' => 'required',
        ]);

        if($this->delivery_method === 'address'){
            $this->validateOnly($fields, [
                'address' => 'required',
            ]);
        }elseif ($this->delivery_method === 'department'){
            $this->validateOnly($fields, [
                'department' => 'required'
            ]);
        }
    }
    protected $messages = [
        'lastname.required' => 'Поле прізвище обов\'язкове для заповнення',
        'name.required' => 'Поле ім\'я обов\'язкове для заповнення',
        'email.required|email' => 'Поле email обов\'язкове для заповнення',
        'phone.required|numeric' => 'Поле телефон обов\'язкове для заповнення',
        'city.required' => 'Поле місто обов\'язкове для заповнення',
        'province.required' => 'Поле область обов\'язкове для заповнення',
        'address.required' => 'Поле адреса обов\'язкове для заповнення',
        'department.required' => 'Поле відділення обов\'язкове для заповнення',
    ];


    public function placeOrder() {
        $this->validate([
            'lastname' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'city' => 'required',
            'province' => 'required',
        ]);
        if($this->delivery_method === 'address'){
            $this->validate( [
                'address' => 'required',
            ]);
        }elseif ($this->delivery_method === 'department'){
            $this->validate([
                'department' => 'required'
            ]);
        }
        //1 -Save order
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->subtotal = str_replace(',', '', $order->subtotal);

        $order->lastname = $this->lastname;
        $order->name = $this->name;
        $order->email = $this->email;
        $order->phone = $this->phone;
        $order->address = $this->address;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->department = $this->department;
        $order->status = 'замовлено';
        $order->payment_type = $this->payment_method;
        $order->save();

        //2 -save order items
        foreach(Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        //3-Save shipping
            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->lastname = $this->lastname;
            $shipping->name = $this->name;
            $shipping->email = $this->email;
            $shipping->phone = $this->phone;
            $shipping->address = $this->address;
            $shipping->department = $this->department;
            $shipping->city = $this->city;
            $shipping->province = $this->province;
            $shipping->save();

        $this->sendOrderConfirmationMail($order);
        $this->resetCart();
    }

    public function resetCart(){
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function sendOrderConfirmationMail($order){
        Mail::to($order->email)->send(new OrderMail($order));
    }

    public function verifyForCheckout(){
        if(!Auth::check()){
            return redirect()->route('login');
        }elseif($this->thankyou){
            return redirect()->route('thankyou');
        }elseif(!session()->get('checkout')){
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
