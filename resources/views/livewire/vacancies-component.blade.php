@section('title')
    Вакансії
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('vacancies') }}
                </div>
            </div>
        </div>
    </div>
    <div class="payshipping_main_container">
        <div class="left_box">
            <div class="left_content_container">
                <ul>
                    <li><a href="{{ route('discounts') }}">Акції</a></li>
                    <li><a href="{{route('payshipping')}}">Оплата і доставка</a></li>
                    <li><a href="{{route('warrantyreturns')}}">Гарантія та повернення</a></li>
                    <li><a href="{{route('afterwarranty')}}" >Гарантійне
                            і післягарантійне
                            обслуговування</a></li>
                    <li><a href="{{route('certifiedgood')}}">Сертифіковані товари</a></li>
                    <li><a href="{{route('about')}}">Про нас</a></li>
                    <li><a href="{{route('contact')}}">Контакти</a></li>
                </ul>
                <ul>
                    <li><a href="{{route('hotsales')}}">Гарячі знижки</a></li>
                    <li><a href="{{route('top')}}">Топ продажу</a></li>
                    <li><a href="{{route('new')}}">Новинки</a></li>
                </ul>
                <ul>
                    <li><a href="{{route('architectdesigner')}}">Архітекторам та дизайнерам</a></li>
                    <li><a href="{{route('manufecturer')}}">Виробники</a></li>
                    <li><a href="{{ route('vacancies') }}" style="text-decoration: underline; font-weight: 500;">Вакансії</a></li>
                    <li><a href="{{route('loyaltyprogram')}}" >Програма
                            лояльності</a></li>
                </ul>
            </div>
        </div>
        <div class="right_box">
            <h4>ВАКАНСІЇ</h4>
            <div class="vacancies_list mt-4">
                <p style="font-weight: 400;">Інтернет-магазин MAKE UNIQUE у зв'язку з розвитком компанії шукає:</p>
                <ul>
                    <li><span>інтернет-маркетолога</span></li>
                    <li><span>менеджера з продажу меблів</span></li>
                    <li><span>менеджера з продажу меблів, продавця консультанта в шоурум(Київ)</span></li>
                </ul>
                <p class="mt-4">Ми — молода команда людей, які горять ідеями, безустанно навчаються нового і працюють, щоб створити сервіс,
                    який дійсно буде корисний людям.</p>
            </div>
            <div class="mt-5">
                <p style="font-weight: 400;">Готові відповісти на всі Ваші запитання і узгодити співпрацю:</p>
                <p>Ви можете написати нам на електронну пошту <span style="font-weight: 500;">servіce@makeunique</span>.</p>
            </div>
        </div>
    </div>
</div>

