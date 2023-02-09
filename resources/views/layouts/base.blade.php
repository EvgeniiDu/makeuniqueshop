<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Make Unique - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-adaptive-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link
        href='https://fonts.googleapis.com/css?family=Roboto:700,400,600,500,400,300,200&display=swap&subset=latin,cyrillic'
        rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400&display=swap&&subset=latin,cyrillic"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
{{--    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    @livewireStyles
</head>
<body>
<div class="wrapper">
    <header class="header">
        <nav class="header_auth auth">
            <div class="_container">
                @if (Route::has('login'))
                    <ul class="auth_list">
                        @auth
                            <li class="auth_item">
                                {{ Auth::user()->name }}
                            </li>
                            <li class="auth_item">
                                <a href="{{ route('user.profile') }}" class="auth_link">Профіль</a>
                            </li>
                        @else
                            <li class="auth_item">
                                <a href="{{ route('register') }}" class="auth_link">Реєстрація</a>
                            </li>
                            <li class="auth_item">
                                <a href="{{ route('login') }}" class="auth_link">Авторизація</a>
                            </li>
                        @endif
                        <li class="auth_item_ua">
                            <a href="" class="auth_link">UA</a>
                        </li>
                    </ul>

                @endif
            </div>
        </nav>
        <div class="header_container">
            <div class="_container">
                <nav class="header_search">
                    <div class="logotype">
                        <a href="/">
                            <img src="{{asset('assets/images/Logo.jpg')}}" alt="" class="logo">
                        </a>
                    </div>
                    <div class="search_buttons">
                        <div class="buttons">
                            <div class="border">
                                <img src="{{asset('assets/images/hot_icon.png')}}" alt="" class="item_icon_btn">
                                <a href="{{route('hotsales')}}" class="btn_item">Гарячі знижки</a>
                            </div>
                            <div class="border">
                                <img src="{{asset('assets/images/top_icon.png')}}" alt="" class="item_icon_btn">
                                <a href="{{route('top')}}" class="btn_item">Топ продажу</a>
                            </div>
                            <div class="border">
                                <img src="{{asset('assets/images/news_icon.png')}}" alt="" class="item_icon_btn">
                                <a href="{{route('new')}}" class="btn_item">Новинки</a>
                            </div>
                        </div>
                        <div class="search col-8">
                            @livewire('header-search-component')
                        </div>
                    </div>
                    <div class="likes_cart">
                        @livewire('wishlist-count-component')
                        @livewire('cart-count-component')
                    </div>
                </nav>
            </div>
        </div>
        <nav class="header_menu menu">
            <div class="container_menu">
                <ul class="menu_list">
                    <li class="menu_item">
                        <a href="/" class="item_link">
                            <img src="{{asset('assets/images/home_icon.jpg')}}" alt="">
                        </a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('catalog')  }}" class="item_link">КАТАЛОГ</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('discounts') }}" class="item_link">АКЦІЇ</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('payshipping') }}" class="item_link">ОПЛАТА І ДОСТАВКА</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('warrantyreturns') }}" class="item_link">ГАРАНТІЯ ТА ПОВЕРНЕННЯ</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('about') }}" class="item_link">ПРО НАС</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('contact') }}" class="item_link">КОНТАКТИ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    {{--MAIN CONTEN----------------------------------------------------------------------}}

    <main class="main">
        {{ $slot }}
    </main>
    <div class="preference_container">
        <div class="preference_box">
            <ul class="preference_list">
                <li class="preference_item">
                    <a href="{{route('payshipping')}}">
                        <div>
                            <img src="{{asset('assets/images/delivery_icon.png')}}" alt="">
                        </div>
                        <div class="span_item">
                            <span>Безкоштовна <br>доставка</span>
                        </div>
                    </a>
                </li>
                <li class="preference_item">
                    <a href="{{route('loyaltyprogram')}}">
                        <div>
                            <img src="{{asset('assets/images/bonus_icon.png')}}" alt="">
                        </div>
                        <div class="span_item">
                            <span>Бонуси <br>за покупки</span>
                        </div>
                    </a>
                </li>
                <li class="preference_item">
                    <a href="{{route('afterwarranty')}}">
                        <div>
                            <img src="{{asset('assets/images/guarantee_icon.png')}}" alt="">
                        </div>
                        <div class="span_item">
                            <span>Гарантійне і <br>післягарантійне<br>обслуговування</span>
                        </div>
                    </a>
                </li>
                <li class="preference_item">
                    <a href="{{route('warrantyreturns')}}">
                        <div>
                            <img src="{{asset('assets/images/return_icon.png')}}" alt="">
                        </div>
                        <div class="span_item">
                            <span>Гарантоване<br>повернення і обмін</span>
                        </div>
                    </a>
                </li>
                <li class="preference_item">
                    <a href="{{route('certifiedgood')}}">
                        <div>
                            <img src="{{asset('assets/images/certified_icon.png')}}" alt="">
                        </div>
                        <div class="span_item">
                            <span>Сертифіковані<br>товари</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="mailing_list">
        <div class="icon_mail">
            <img src="{{asset('assets/images/mail_icon.png')}}" alt="">
        </div>
        <div class="subscribe_container">
            @if(Session::has('success_subscribe'))
                <div class="alert alert-success">
                    {{ Session::get('success_subscribe') }}
                </div>
            @endif
            <div class="header_subscribe">
                <span>Підпишіться нa <b>РОЗСИЛКУ</b></span>
            </div>
                <div class="input_mail">
                    <form class="form_subscribe" action="/subscribe" method="post">
                        @csrf
                        <div class="border_input_mail">
                            <input type="email" name="email" class="email_input"
                                   placeholder="Введіть свою електронну адресу">
                        </div>
                        <div class="border_btn_subscribe">
                            <input type="submit" name="subscribe" class="subscribe_submit" value="Підпишіться">
                            <img src="{{asset('assets/images/mail_logo.png')}}" alt="">
                        </div>
                    </form>
                </div>
            <div class="social_container">
                <ul class="social_menu">
                    <li class="social_item">
                        <a href=""><img src="{{asset('assets/images/facebook_icon.png')}}" alt=""></a>
                    </li>
                    <li class="social_item">
                        <a href=""><img src="{{asset('assets/images/twitter_icon.png')}}" alt=""></a>
                    </li>
                    <li class="social_item">
                        <a href=""><img src="{{asset('assets/images/insta_icon.png')}}" alt=""></a>
                    </li>
                    <li class="social_item">
                        <a href=""><img src="{{asset('assets/images/pinterest_icon.png')}}" alt=""></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{--  FOOTER------------------------------------------      --}}
    <footer class="footer">
        <div class="footer_container">
            <div class="logotype_footer">
                <a href="/">
                    <img src="{{asset('assets/images/Logo.jpg')}}" alt="" class="logo">
                </a>
            </div>
            <div class="footer_menu">
                <ul class="menu_list_items">
                    <li class="menu_item">
                        <a href="{{ route('catalog')  }}" class="item_link">КАТАЛОГ</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('discounts') }}" class="item_link">АКЦІЇ</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('payshipping') }}" class="item_link">ОПЛАТА І ДОСТАВКА</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('warrantyreturns') }}" class="item_link">ГАРАНТІЯ ТА ПОВЕРНЕННЯ</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('about') }}" class="item_link">ПРО НАС</a>
                    </li>
                    <li class="menu_item">
                        <a href="{{ route('contact') }}" class="item_link">КОНТАКТИ</a>
                    </li>
                </ul>
            </div>
            <div class="footer_contacts">
                <div>
                    <span>КОНТАКТИ:</span>
                </div>
                <ul class="contacts_items">
                    <li class="contact_item">
                        <span>+38 (044) 335-55-05</span>
                    </li>
                    <li class="contact_item">
                        <span>+38 (044) 035-05-85</span>
                    </li>
                    <li class="contact_item">
                        <img src="{{asset('assets/images/viber_icon.png')}}" alt="">
                        <span>+38 (093) 035-05-85</span>
                    </li>
                    <li class="contact_item">
                        <img src="{{asset('assets/images/whatsapp_icon.png')}}" alt="">
                        <span>+38 (067) 365-65-55</span>
                    </li>
                    <li class="contact_item">
                        <img src="{{asset('assets/images/telegram_icon.png')}}" alt="">
                        <span>+38 (066) 045-80-85</span>
                    </li>
                </ul>
            </div>
            <div class="footer_info">
                <ul class="menu_list_items">
                    <li class="footer_menu_item">
                        <a href="{{route('loyaltyprogram')}}" class="item_link">ПРОГРАМА ЛОЯЛЬНОСТІ</a>
                    </li>
                    <li class="footer_menu_item">
                        <a href="{{route('architectdesigner')}}" class="item_link">АРХІТЕКТОРАМ ТА ДИЗАЙНЕРАМ</a>
                    </li>
                    <li class="footer_menu_item">
                        <a href="{{route('manufecturer')}}" class="item_link">ВИРОБНИКИ</a>
                    </li>
                    <li class="footer_menu_item">
                        <a href="{{ route('vacancies') }}" class="item_link">ВАКАНСІЇ</a>
                    </li>
                    <li class="footer_menu_item">
                        <a href="#" class="item_link">УМОВИ ВИКОРИСТАННЯ САЙТУ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <div class="row">
                <div class="col-lg-6 col-md-12 copyright_text">
                    <p> &copy; 2010 - 2023 "MakeUnique"</p>
                </div>
            </div>
        </div>
        <div class="decor_line"></div>
    </footer>
</div>


<script src="{{ asset('assets/js/jquery.min.js') }} "></script>
<script src="{{ asset('assets/js/owl.carousel.js') }} "></script>
<script src="{{ asset('assets/js/simple-adaptive-slider.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('assets/js/functions.js') }} "></script>
<script src="{{ asset('assets/js/script.js') }} "></script>
@livewireScripts

@stack('scripts')
</body>
</html>
