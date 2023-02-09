@section('title')
    Персональні дані
@endsection
<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('user.profile') }}
                </div>
            </div>
        </div>
    </div>
    <div class="_container profile_main_container">
        @if(Session::has('success_message'))
            <div class="alert alert-success">
                {{ Session::get('success_message') }}
            </div>
        @endif
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
                            <a href="{{route('user.profile')}}"><span
                                    style="text-decoration: underline; font-weight: 500;">Персональні дані</span></a>
                        </li>
                        <li class="mt-2 nav_item">
                            <img src="{{ asset('assets/images/icon_heart.png') }}" alt="" class="icon_profile">
                            <a href="{{route('product.wishlist')}}"><span>Список обраного</span></a>
                        </li>
                        <li class="mt-2 nav_item">
                            <img src="{{ asset('assets/images/icon_folder.png') }}" alt="" class="icon_profile">
                            <a href="{{route('user.myorders')}}"><span>Ваші замовлення</span></a>
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
            <div class="info_block">
                <div class="line_header">
                    <span>Персональні дані</span>
                </div>
                <div class="input_block_profile">
                    <div class="input_item">
                        <div class="label_name">
                            <label for="lastname">Прізвище</label>
                        </div>
                        <input id="lastname" class="block mt-1 w-full input_line_profile" type="text" name="lastname"
                               value="{{ Auth::user()->lastname }}" readonly/>
                    </div>
                    <div class="input_item">
                        <div class="label_name">
                            <label for="name">Ім'я</label>
                        </div>
                        <input id="name" class="block mt-1 w-full input_line_profile" type="text" name="name"
                               value="{{ Auth::user()->name }}" readonly/>
                    </div>
                </div>
                <div class="input_block_profile">
                    <div class="input_item">
                        <div class="label_name">
                            <label for="lastname">Email</label>
                        </div>
                        <input id="lastname" class="block mt-1 w-full input_line_profile" type="text" name="lastname"
                               value="{{ Auth::user()->email }}" readonly/>
                    </div>
                    <div class="input_item">
                        <div class="label_name">
                            <label for="name">Телефон</label>
                        </div>
                        <input id="name" class="block mt-1 w-full input_line_profile" type="text" name="name"
                               value="{{ Auth::user()->phone }}" readonly/>
                    </div>
                </div>
                <div class="input_block_profile">
                    <div>
                        <div class="mt-5 change_pass_btn">
                            <a href="{{ route('user.changepassword') }}">Змінити пароль</a>
                        </div>
                    </div>
                    <div>
                        <div class="mt-5 catalog_btn">
                            <a href="{{ route('catalog') }}">Перейти до покупок</a>
                        </div>
                    </div>
                </div>
                <div class="mt-5 edit_profile_btn">
                    <a href="{{ route('user.editprofile') }}">Редагувати профіль</a>
                </div>
                @if(Auth::user()->admin == 1)
                    <div class="mt-5 edit_profile_btn">
                        <a href="{{ route('admin.home') }}">Адмін панель</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="logo_block_profile">
            <div class="logo_row_make">
                <img src="{{asset('assets/images/logo/MakeUnique.png')}}" alt="">
            </div>
        </div>
    </div>
</div>

