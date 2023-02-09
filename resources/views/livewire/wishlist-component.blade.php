@section('title')
    Обрані товари
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('product.wishlist') }}
                </div>
            </div>
        </div>
    </div>

    <div class="cart_container">
        @if(Cart::instance('wishlist')->count() > 0)
            <div class="cart_items">
                @foreach(Cart::instance('wishlist')->content() as $item)
                    <div class="cart_item">
                        <div class="cart_image_item">
                            <a href="{{ route('product.details', ['prodSlug' => $item->model->slug]) }}"><img
                                    src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                                    alt="{{ $item->model->image }}"></a>
                            <i class="fa fa-heart fill_heart heart_item_wishlist"></i>
                        </div>
                        <div class="cart_info_item">
                            <div class="cart_info_item_container">
                                <div class="header_item_title">
                                    <a href="{{ route('product.details', ['prodSlug' => $item->model->slug]) }}"><span>{{ $item->model->title }}</span></a>
                                </div>
                                <div class="characteristics_product">
                                    <div class="labels_column">
                                        <div class="label_row">
                                            <label>Покриття:</label>
                                        </div>
                                        <div class="label_row">
                                            <label>Матеріал:</label>
                                        </div>
                                        <div class="label_row">
                                            <label>Розмір:</label>
                                        </div>
                                        <div class="label_row">
                                            <label>Колір:</label>
                                        </div>
                                    </div>
                                    <div class="proportions_column">
                                        <div class="proportion_row">
                                            <span>{{ $item->model->material }}</span>
                                        </div>
                                        <div class="proportion_row">
                                            <span>{{ $item->model->coating }}</span>
                                        </div>
                                        <div class="proportion_row">
                                            <span class="info_span" id="size">{{ $item->model->length }}x{{ $item->model->width }}x{{$item->model->height }}h</span>
                                        </div>
                                        <div class="proportion_row">
                                            <span>{{ $item->model->color->title }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quantity_price_container">
                                <div class="price_sale_area">
                                    <div class="delete_btn">
                                        <img src="{{ asset('assets/images/del_icon.png') }}" wire:click.prevent="destroy('{{ $item->rowId }}')">
                                    </div>
                                    @if($item->model->sale_price)
                                        <div class="old_price">
                                            <span class="old_regular_price">{{number_format($item->model->regular_price, 0, '', ' ')}}грн</span>
                                            <label class="save_money">Економ</label>
                                            <span class="save_money">{{number_format($item->model->regular_price-$item->model->sale_price, 0, '', ' ')}}грн</span>
                                        </div>
                                    @endif
                                    <div class="cart_price_item">
                                        <label>Ціна:</label>
                                        <span>{{ number_format($item->price, 0, '', ' ') }}грн</span>
                                    </div>
                                </div>
                                <div class="add_to_cart_btn">
                                    <a href="#" wire:click="store({{$item->model->id}}, '{{$item->model->title}}', {{ $item->model->sale_price ?? $item->model->regular_price }})">додати до кошика</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="buttons_wish_container">
                <div class="continue_shopping_btn">
                    <a href="{{route('catalog')}}" >продовжити покупки</a>
                </div>
                <div class="clear_cart_btn">
                    <a href="#" wire:click.prevent="destroyAll()">видалити обрані товари</a>
                </div>
            </div>
        @else
            <div class="empty_cart">
                <p>Поки що у Вас немає обраних товарів.</p>
                <div class="continue_shopping_btn_empty">
                    <a href="{{route('catalog')}}">продовжити покупки</a>
                </div>
            </div>
    </div>
    @endif
</div>
@livewire('offered-products-component')
</div>
