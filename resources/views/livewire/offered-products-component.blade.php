<div class="hot_products">
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <span>Вам також може сподобатися</span>
            </div>
        </div>
    </div>
    <div class="hot_content">
        <div class="owl-carousel owl-carousel-top-products owl-theme" wire:ignore>
            @foreach($products as $product)
                <div class="item">
                    <div class="image_product scale_img">
                        @if($product->sale_price != null)
                        <div class="icon_product">
                            <img src="{{asset('assets/images/hot_icon.png')}}" alt="">
                        </div>
                        @endif
                            @if($product->sale_price == null && $product->top_sale == 1)
                                <div class="icon_product">
                                    <img src="{{asset('assets/images/top_icon.png')}}" alt="">
                                </div>
                            @endif

                        <a href="{{ route('product.details', ['prodSlug' => $product->slug]) }}"><img
                                src="{{asset('assets/images/products')}}/{{$product->image}}" alt=""></a>
                    </div>
                    <div class="descrip_product">
                        <div class="title_prod">
                            <a href="{{ route('product.details', ['prodSlug' => $product->slug]) }}">{{ $product->title }}</a>
                        </div>
                        <div class="info_div_box">
                            <div class="info_div">
                                <label for="color">Колір:</label>
                                <span class="info_span" id="color">{{ $product->color->title }}</span>
                            </div>
                            <div class="info_div">
                                <label for="cover">Матеріал:</label>
                                <span class="info_span" id="cover">{{ $product->material }}</span>
                            </div>
                            <div class="info_div">
                                <label for="size">Розмір:</label>
                                <span class="info_span" id="size">{{ $product->length }}x{{ $product->width }}x{{ $product->height }}h</span>
                            </div>
                        </div>
                        @if($product->sale_price)
                            <div class="price_old_box">
                                <span>{{ number_format($product->regular_price, 0, '', ' ') }}грн</span>
                            </div>
                        @endif
                        <div class="price_prod">
                            <div class="cart_icon_box">
                                <a href=""
                                   wire:click.prevent="store({{ $product->id}}, '{{ $product->title }}', {{$product->sale_price ?? $product->regular_price}} )"><img
                                        src="{{asset('assets/images/cart_icon.png')}}" alt=""></a>
                            </div>
                            <div class="main_price_box">
                                <span class="label_price">Ціна:</span>
                                <span class="info_span price_cost">{{ number_format($product->sale_price ?? $product->regular_price, 0, '', ' ') }}грн</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
