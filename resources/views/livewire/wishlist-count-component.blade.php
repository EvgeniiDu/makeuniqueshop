<a class="wishlist_link" href="{{route('product.wishlist')}}">
    <div class="likes">
        <div class="wish_product">
            <i class="fa fa-heart fill_heart"></i>
        </div>
        <div class="likes_count">
            <span>{{ Cart::instance('wishlist')->count()  }}</span>
        </div>
    </div>
</a>
