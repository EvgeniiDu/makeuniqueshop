@section('title')
    Замовлення
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('checkout') }}
                </div>
            </div>
        </div>
    </div>
    <form wire:submit.prevent="placeOrder">
        <div class="checkout_main_container">
            <div class="personal_customer_data_container">
                <div class="personal_data_customer_box">
                    <div class="header_personal_data">
                        <p>Персональні дані</p>
                    </div>
                    <div class="personal_data_labels_inputs">
                        <div class="personal_data_box">
                            <div class="data_box">
                                <div class="label_input_field">
                                    <label for="lastname">Ваше прізвище</label>
                                    <div class="input_with_error_container">
                                        <input type="text" name="lastname" class="form-control  @error('lastname') is-invalid @enderror"
                                               value="{{Auth::user()->lastname}}" wire:model="lastname">
                                        @error('lastname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="label_input_field">
                                    <label for="name">Ваше ім'я</label>
                                    <div class="input_with_error_container">
                                        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" wire:model="name">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="label_input_field">
                                    <label for="phone">Телефон</label>
                                    <div class="input_with_error_container">
                                        <input type="text" name="phone" id="phone-mask" class="form-control  @error('phone') is-invalid @enderror" wire:model="phone">
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="label_input_field">
                                    <label for="email">Email</label>
                                    <div class="input_with_error_container">
                                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" wire:model="email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header_personal_data">
                        <p>Вибір способів доставки і оплати</p>
                    </div>
                    <div class="personal_data_labels_inputs delivery_method">
                        <div class="personal_data_box">
                            <div class="data_box">
                                <div class="label_input_field">
                                    <label for="delivery">Доставка</label>
                                    <div class="radio_delivery_container">
                                        <div class="radio_delivery_box">
                                            <input type="radio" name="delivery_method" value="address"
                                                   wire:model="delivery_method">
                                            <div class="label_delivery_box">
                                                <label for="method1">Доставка
                                                    адресна<br><span>Безкоштовно по Києву</span></label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="radio_delivery_box">
                                                <input type="radio" name="delivery_method" value="department"
                                                       wire:model="delivery_method">
                                                <div class="label_delivery_box">
                                                    <label for="method2">Доставка на відділення<br><span>За тарифами перевізника</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="label_input_field">
                                    <label for="payment">Оплата</label>
                                    <div class="radio_delivery_container">
                                        <div class="radio_delivery_box">
                                            @if($delivery_method === 'address')
                                                <input type="radio" value="готівкою"
                                                       wire:model="payment_method">
                                                <div class="label_delivery_box">
                                                    <label
                                                        for="method1">Готівкою<br><span>при отриманні замовлення</span></label>
                                                </div>
                                            @else
                                                <input type="radio" value="післяплата"
                                                       wire:model="payment_method">
                                                <div class="label_delivery_box">
                                                    <label
                                                        for="method1">Післяплата</label>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="radio_delivery_box">
                                            <input type="radio" value="картка"
                                                   wire:model="payment_method">
                                            <div class="label_delivery_box">
                                                <label for="method2">На карту ПриватБанк</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="address_delivery"
                         class="address_delivery_container @if($delivery_method === 'department') hide_container @endif">
                        <div class="header_personal_data">
                            <p>Адреса доставки</p>
                        </div>
                        <div class="personal_data_labels_inputs address_data">
                            <div class="personal_data_box">
                                <div class="data_box">
                                    <div class="label_input_field">
                                        <label for="lastname">Область</label>
                                        <div class="input_with_error_container">
                                            <input type="text" name="province" class="form-control  @error('province') is-invalid @enderror" wire:model="province"
                                                   placeholder="Київська">
                                            @error('province')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="label_input_field">
                                        <label for="city">Місто</label>
                                        <div class="input_with_error_container">
                                            <input type="text" name="city"  class="form-control  @error('city') is-invalid @enderror" wire:model="city"
                                                   placeholder="Київ">
                                            @error('city')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="label_input_field">
                                        <label for="address">Адреса</label>
                                        <div class="input_with_error_container">
                                            <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror"
                                                   wire:model="address" placeholder="вул. Антоновича, 6">
                                            @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="department_delivery"
                         class="department_delivery_container @if($delivery_method === 'address') hide_container @endif">
                        <div class="header_personal_data">
                            <p>Доставка на відділення нової пошти</p>
                        </div>
                        <div class="personal_data_labels_inputs address_data">
                            <div class="personal_data_box">
                                <div class="data_box">
                                    <div class="label_input_field">
                                        <label for="lastname">Область</label>
                                        <div class="input_with_error_container">
                                            <input type="text" name="province" class="form-control  @error('province') is-invalid @enderror" wire:model="province"
                                                   placeholder="Київська">
                                            @error('province')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="label_input_field">
                                        <label for="name">Місто</label>
                                        <div class="input_with_error_container">
                                            <input type="text" name="city" class="form-control  @error('city') is-invalid @enderror" wire:model="city"
                                                   placeholder="Київ">
                                            @error('city')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="label_input_field">
                                        <label for="department">Відділення</label>
                                        <div class="input_with_error_container">
                                            <input type="text" name="department" class="form-control  @error('department') is-invalid @enderror"
                                                   wire:model="department"
                                                   placeholder="54">
                                            @error('department')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list_product_ordered_container">
                <div class="header_product_orders">
                    <p>Ваше замовлення</p>
                </div>
                <div class="orders_content_box">
                    @foreach(Cart::instance('cart')->content() as $item)
                        <div class="cart_item">
                            <div class="cart_image_item">
                                <img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}"
                                     alt="{{ $item->model->image }}">
                            </div>
                            <div class="cart_info_item">
                                <div class="header_item_title">
                                    <a href="{{ route('product.details', ['prodSlug' => $item->model->slug]) }}">{{$item->model->title}}</a>
                                </div>
                                <div class="code_product_price">
                                    <div class="label_row">
                                        <label>Код продукту:</label>
                                        <span>{{ $item->model->SKU }}</span>
                                    </div>
                                    <div class="cart_total_price_item">
                                        <span>{{ number_format($item->subtotal, 0, '', ' ') }}грн</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="total_price_box">
                        <div class="header_total_price">
                            <p>Загальна сума</p>
                        </div>
                        <div class="total_sum_delivery">
                            <div class="label_row">
                                <label>Вартість продуктів:</label>
                                <span>{{ Cart::instance('cart')->subtotal(0, '.', ' ')}}грн</span>
                            </div>
                            <div class="label_row">
                                <label>Доставка:</label>
                                <span>0грн</span>
                            </div>
                            <hr>
                            <div class="label_row_total">
                                <label>До оплати:</label>
                                <span>{{ Cart::instance('cart')->subtotal(0, '.', ' ')}}грн</span>
                            </div>
                        </div>
                    </div>
                    <div class="confirm_order_btn_box">
                        <div class="confirm_order_btn">
                            <a href="#" wire:click.prevent="placeOrder">підтвердити замовлення</a>
                        </div>
                    </div>
                    <div class="continue_order_btn_box">
                        <div class="continue_shopping_btn">
                            <a href="{{route('catalog')}}">продовжити покупки</a>
                        </div>
                    </div>
                    <div class="text_obout_order">
                        <p>Підтверджуючи замовлення, я підтверджую умови <a href="#">Публічної оферти</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>

        $(document).ready(function (){
            $("#phone-mask").mask("+380 (99)999-99-99")
        })

    </script>
@endpush
