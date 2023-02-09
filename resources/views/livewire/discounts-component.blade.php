@section('title')
    Акції
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('discounts') }}
                </div>
            </div>
        </div>
    </div>

    <div class="discount_main_container">
        <div class="header_box_discount">
            <div class="left_box">
                <div class="left_content_container">
                    <ul>
                        <li><a href="{{ route('discounts') }}"style="text-decoration: underline; font-weight: 500;">Акції</a></li>
                        <li><a href="{{route('payshipping')}}">Оплата і доставка</a></li>
                        <li><a href="{{route('warrantyreturns')}}">Гарантія та повернення</a></li>
                        <li><a href="{{route('afterwarranty')}}">Гарантійне і післягарантійне
                                обслуговування</a></li>
                        <li><a href="{{route('certifiedgood')}}">Сертифіковані товари</a></li>
                        <li><a href="{{route('about')}}" >Про нас</a></li>
                        <li><a href="{{route('contact')}}" >Контакти</a></li>
                    </ul>
                    <ul>
                        <li><a href="{{route('hotsales')}}">Гарячі знижки</a></li>
                        <li><a href="{{route('top')}}">Топ продажу</a></li>
                        <li><a href="{{route('new')}}">Новинки</a></li>
                    </ul>
                    <ul>
                        <li><a href="{{route('architectdesigner')}}">Архітекторам та дизайнерам</a></li>
                        <li><a href="{{route('manufecturer')}}">Виробники</a></li>
                        <li><a href="{{ route('vacancies') }}">Вакансії</a></li>
                        <li><a href="{{route('loyaltyprogram')}}" >Програма
                                лояльності</a></li>
                    </ul>
                </div>
            </div>
            <div class="right_box">
                <div class="discount_poster">
                    <img src="{{asset('assets/images/discount_poster.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="hot_products">
            <div class="discount_header">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
                <img src="{{asset('assets/images/percent.png')}}" alt="">
            </div>
            <div class="hot_content">
                <div class="owl-carousel owl-carousel-hot-products owl-theme" wire:ignore>
                    @foreach($products_hot as $product)
                        <div class="item">
                            <div class="image_product scale_img">
                                <div class="icon_product">
                                    <img src="{{asset('assets/images/hot_icon.png')}}" alt="">
                                </div>
                                <a href="{{ route('product.details', ['prodSlug' => $product->slug]) }}"><img src="{{asset('assets/images/products')}}/{{$product->image}}" alt=""></a>
                                <div class="discount_product">
                                    <img src="{{asset('assets/images/percent_icon.png')}}" alt="">
                                </div>
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
        @livewire('offered-products-component')
    </div>
</div>
