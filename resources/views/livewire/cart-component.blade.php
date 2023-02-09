@section('title')
    Кошик
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('cart') }}
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="cart_container">
            @if(Cart::instance('cart')->count() > 0)
                @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <strong>Успішно</strong>
                        {{ Session::get('success_message') }}
                    </div>
                @endif
                <div class="cart_items">
                    @foreach(Cart::instance('cart')->content() as $item)
                        <div class="cart_item">
                            <div class="cart_image_item">
                                <a href="{{ route('product.details', ['prodSlug' => $item->model->slug]) }}"><img
                                        src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                                        alt="{{ $item->model->image }}"></a>
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
                                                <span>{{ $item->model->coating }}</span>
                                            </div>
                                            <div class="proportion_row">
                                                <span>{{ $item->model->material }}</span>
                                            </div>
                                            <div class="proportion_row">
                                                <span class="info_span" id="size">{{ $item->model->length }}x{{ $item->model->width }}x{{ $item->model->height }}h</span>
                                            </div>
                                            <div class="proportion_row">
                                                <div class="color_item">
                                                    @if($item->options->has('color_title'))
                                                        <img
                                                            src="{{asset('assets/images/colors')}}/{{$item->options['color_image']}}"
                                                            alt="" width="38px">
                                                        <span>{{ $item->options['color_title']}}</span>
                                                    @else
                                                        {{$item->model->color->title}}
                                                    @endif
                                                </div>
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
                                    <div class="total_quantity_area">
                                        <div class="quantity-input">
                                            <button wire:click.prevent="decreaseQty('{{ $item->rowId }}')">-</button>
                                            <input type="number" name="productQuatity" value="{{ $item->qty }}"
                                                   data-max="120" pattern="[0-9]*">
                                            <button wire:click.prevent="increaseQty('{{ $item->rowId }}')">+</button>
                                        </div>
                                        <div class="cart_total_price_item">
                                            <span>{{ number_format($item->subtotal, 0, '', ' ') }}грн</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="total_items_cart">
                        <div class="labels_total">
                            <div class="label_item">
                                <p>сума</p>
                            </div>
                            <div class="label_item">
                                <label>Товари:</label>
                            </div>
                            <div class="label_item">
                                <label>Загальна сума:</label>
                            </div>
                        </div>
                        <div class="total_quantity_price">
                            <div class="total_quantity">
                                <span>{{ Cart::instance('cart')->count()  }}</span>
                            </div>
                            <div class="total_price">
                                <span>{{ Cart::instance('cart')->subtotal(0, '.', ' ')}}грн</span>
                            </div>
                        </div>
                        <div class="total_without_shipping">
                            <span>(Ціна вказана без урахування доставки)</span>
                        </div>
                        <div class="total_price_container">
                            <label for="">До оплати:</label>
                            <span>{{Cart::instance('cart')->subtotal(0, '.', ' ')}}грн</span>
                        </div>
                    </div>
                    <div class="buttons_container">
                        <div class="continue_shopping_btn">
                            <a href="{{route('catalog')}}">продовжити покупки</a>
                        </div>
                        <div class="confirm_order_btn">
                            <a href="#" wire:click.prevent="checkout">оформити замовлення</a>
                        </div>
                        <div class="clear_cart_btn">
                            <a href="#" wire:click.prevent="destroyAll()">Очистити кошик</a>
                        </div>
                    </div>
                    @else
                        <div class="empty_cart">
                            <p>Поки що Ваш кошик порожній. Наповніть його меблями своєї мрії 🤩</p>
                            <div class="continue_shopping_btn_empty">
                                <a href="{{route('catalog')}}">продовжити покупки</a>
                            </div>
                        </div>
                </div>
            @endif

        </div>
    </div>

    <div class="offered_products_container">
        @livewire('offered-products-component')
    </div>
</div>
