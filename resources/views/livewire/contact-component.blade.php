@section('title')
    Контакти
@endsection


<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('contact') }}
                </div>
            </div>
        </div>
    </div>

    <div class="payshipping_main_container">
        <div class="left_box">
            <div class="left_content_container">
                <ul>
                    <li><a href="{{ route('discounts') }}" >Акції</a></li>
                    <li><a href="{{route('payshipping')}}">Оплата і доставка</a></li>
                    <li><a href="{{route('warrantyreturns')}}">Гарантія та повернення</a></li>
                    <li><a href="{{route('afterwarranty')}}">Гарантійне і післягарантійне
                            обслуговування</a></li>
                    <li><a href="">Сертифіковані товари</a></li>
                    <li><a href="{{route('about')}}" >Про нас</a></li>
                    <li><a href="{{route('contact')}}" style="text-decoration: underline; font-weight: 500;">Контакти</a></li>
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
                    <li><a href="{{route('loyaltyprogram')}}">Програма
                            лояльності</a></li>
                </ul>
            </div>
        </div>
        <div class="right_box">
            <h4>КОНТАКТИ</h4>
            <h5 class="mt-4">Телефони</h5>
            <div class="mt-4 phones_number">
                <div><span class="phone_style">+38 (044) 335-55-05</span></div>
                <div><span class="phone_style">+38 (044) 035-05-85</span></div>
            </div>
            <div class="mt-4">
                <p>Час роботи CALL-центру</p>
                <p>Пн-Пт 9:00-20:00, Сб 9:00-18:00, Нд 9:00-18:00</p>
            </div>
            <div class="mt-4 phones_in_social">
                <div class="phones_in_social_item">
                    <div class="phone_numb">
                        <span class="phone_style">+38 (044) 335-55-05</span>
                    </div>
                    <div class="icon_social">
                        <img src="{{asset('assets/images/viber.png')}}" alt="">
                    </div>
                </div>
                <div class="phones_in_social_item">
                    <div class="phone_numb">
                        <span class="phone_style">+38 (067) 365-65-55</span>
                    </div>
                    <div class="icon_social">
                        <img src="{{asset('assets/images/whatsapp.png')}}" alt="">
                    </div>
                </div>
                <div class="phones_in_social_item">
                    <div class="phone_numb">
                        <span class="phone_style">+38 (066) 045-80-85</span>
                    </div>
                    <div class="icon_social">
                        <img src="{{asset('assets/images/telegram.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
