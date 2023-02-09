@section('title')
    Ваші замовлення
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('user.myorders') }}
                </div>
            </div>
        </div>
    </div>
    <div class="_container profile_main_container">
        <div class="profile_data_block">
            <div class="menu_block">
                <div class="line_name">
                    <img src="{{ asset('assets/images/icon_profile.png') }}" alt="" class="icon_profile">
                    <span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                </div>
                <div class="nav_block">
                    <ul class="nav_items">
                        <li class="nav_item">
                            <img src="{{ asset('assets/images/icon_u.png') }}" alt="" class="icon_profile">
                            <a href="{{route('user.profile')}}"><span>Персональні дані</span></a>
                        </li>
                        <li class="mt-2 nav_item">
                            <img src="{{ asset('assets/images/icon_heart.png') }}" alt="" class="icon_profile">
                            <a href="{{route('product.wishlist')}}"><span>Список обраного</span></a>
                        </li>
                        <li class="mt-2 nav_item">
                            <img src="{{ asset('assets/images/icon_folder.png') }}" alt="" class="icon_profile">
                            <a href="{{route('user.myorders')}}"><span
                                    style="text-decoration: underline; font-weight: 500;">Ваші замовлення</span></a>
                        </li>
                        <li class="mt-5 nav_item exit">
                            <div>
                                <img src="{{ asset('assets/images/icon_exit.png') }}" alt="" class="icon_profile">
                            </div>
                            <div class="form_exit">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="/logout"
                                       onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Вихід') }}
                                    </a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="order_items_box">
                @if($orders->count() > 0)
                @foreach($orders as $order)
                    <div class="order_item">
                        <div class="success_order_icon">
                            <img src="{{asset('assets/images/delivered.png')}}" alt="">
                        </div>
                        <div class="order_info">
                            <div class="order_number">
                                <span>№ {{ $order->id }} від </span>
                                <span>{{ $order->created_at->format('d.m.y') }}</span>
                            </div>
                            <div class="order_status">
                                <span>{{ $order->status }}</span>
                            </div>
                        </div>
                        <div class="order_total">
                            <div>
                                <span>Сума замовлення:</span>
                            </div>
                           <div>
                               <span style="font-weight: 400;">{{ number_format($order->subtotal, 0, '', ' ') }}грн</span>
                           </div>
                        </div>
                        <div class="delete">
                                <img src="{{ asset('assets/images/del_icon.png') }}" wire:click.prevent="destroy('{{ $order->id }}')">
                        </div>
                    </div>
                @endforeach
                @else
                <div style="text-align: center; margin-left: 250px">
                    <p>На жаль, у Вас відсутні замовлення</p>
                </div>
                @endif
                    <div class="mt-4" style="display: flex; justify-content: right">
                        <div class=" catalog_btn">
                            <a href="{{ route('catalog') }}">Перейти до покупок</a>
                        </div>
                    </div>
            </div>

        </div>
        <div class="logo_block_profile">
            <div class="logo_row_make">
                <img src="{{asset('assets/images/logo/MakeUnique.png')}}" alt="">
            </div>
        </div>
    </div>
</div>

