@section('title')
    Виробники
@endsection


<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('certifiedgood') }}
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
                    <li><a href="{{route('certifiedgood')}}" style="text-decoration: underline; font-weight: 500;">Сертифіковані товари</a></li>
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
                    <li><a href="{{route('manufecturer')}}" >Виробники</a></li>
                    <li><a href="{{ route('vacancies') }}">Вакансії</a></li>
                    <li><a href="{{route('loyaltyprogram')}}">Програма
                            лояльності</a></li>
                </ul>
            </div>
        </div>
        <div class="right_box">
            <h4 style="text-transform: uppercase">сертифіковані товари</h4>
            <div class="mt-4">
                <p>Термін гарантійного та післягарантійного обслуговування м'яких та корпусних меблів становить 5
                    років! </p>
                <p>Відповідно до госту 19917-93 і дсту 1637-93 гарантійний термін експлуатації виробів становить 1,5
                    року. Протягом цього часу магазин <span style="font-weight: 500;font-size: 16px;">MAKE UNIQUE</span>
                    здійснює <span style="color: #FD5252">безкоштовний ремонт меблів</span>. </p>
                <p>Після закінчення гарантійного терміну магазином <span style="font-weight: 500;font-size: 16px;">MAKE UNIQUE</span>
                    передбачено післягарантійне обслуговування терміном 3,5 року. Протягом цього терміну ремонт меблів
                    здійснюється <span style="color: #FD5252">за рахунок покупця!</span></p>
            </div>
        </div>
    </div>
</div>

