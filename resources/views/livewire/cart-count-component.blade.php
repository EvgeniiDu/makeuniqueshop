<div class="cart">
    <div class="icon_cart_count">
        <div class="icon_cart">
            <img src="{{asset('assets/images/cart_icon.png')}}" alt="">
        </div>
        <a href="{{ route('product.cart') }}" class="btn">
            {{ Cart::instance('cart')->count()  }} товарів
        </a>
    </div>
</div>
