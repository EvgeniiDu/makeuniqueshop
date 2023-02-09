@section('title')
    Оплата і доставка
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('payshipping') }}
                </div>
            </div>
        </div>
    </div>

    <div class="payshipping_main_container">
        <div class="left_box">
            <div class="left_content_container">
                <ul>
                    <li><a href="{{ route('discounts') }}" >Акції</a></li>
                    <li><a href="{{route('payshipping')}}" style="text-decoration: underline; font-weight: 500;">Оплата і доставка</a></li>
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
            <h4>ОПЛАТА І ДОСТАВКА</h4>
            <br>
            <h5>ОПЛАТА</h5>
            <div class="pay_description" >
                <span>Після оформлення замовлення на Вашу електронну пошту буде вислано офіційний рахунок-фактура, оплатити його
                    можна:</span>
                <ul>
                    <li><b>Готівкою</b> – оплата за меблі проводиться готівкою, під час отримання замовлення;</li>
                    <li><b>Оплата через Privat24</b> – оплата за товар не виходячи з дому;</li>
                    <li><b>Безготівковий розрахунок</b> – плата товару здійснюється через касу будь-якого банку, згідно виставленого рахунку на
                        оплату;</li>
                    <li><b>Безготівковий розрахунок з ПДВ</b> – з наданням всіх відповідних документів (видаткової накладної, податкової
                        накладної). При отриманні потрібне доручення.</li>
                </ul>
            </div>
            <div>
                <span>Реквізити для юридичних осіб:</span><br>
                <span><b>ТОВ «Кредит союз»</b></span><br>
                <span>ЄДРПОУ 59872354, ІПН 249537816982</span><br>
                <span>Р/р UA450870040000579127553645871 , МФО 458006, ЄДРПОУ 57312548, ТОВ "КРЕДит союз"</span>
            </div>
            <div>
                <br>
                <h5>ПЕРЕДОПЛАТА</h5>
                <p>Для підтвердження замовлення необхідно внести передоплату у розмірі 30%</p>
            </div>
            <div>
                <h6>ДОСТАВКА – КАМ'ЯНКА:</h6>
                <p>Доставляємо по всій Україні. Вартість доставки вказана на сторінці товару або при оформлені замовлення.</p>
                <p class="paragraph_content">Більш детальну інформацію щодо доставки можна дізнатися в місцях продажу або за номером телефону
                    контакт-центру (розділ "контакти").
                    Надаємо супровідну документацію для перевезення меблів за кордон.
                    Всі меблі  доставляються у розібраному вигляді та у фабричних упаковках.</p>
            </div>
            <div>
                <h5>ПРИЙОМ ЗАМОВЛЕННЯ</h5>
                <p class="paragraph_content">При отриманні товару, зверніть будь-ласка увагу на цілісність фабричних упаковок. Обов'язково перевірте цілісність
                    дзеркал і скла.
                    У разі відповідності кількості та цілісності упаковки- ставте підпис на документі прийому-передачі та отримайте товар.</p>
            </div>
            <div>
                <h5>У РАЗІ ВИЯВЛЕННЯ ПОШКОДЖЕНЬ:</h5>
                <p class="paragraph_content">Заповніть «Акт про пошкодження вантажу»
                    Повідомте нам про те, що трапилося і ми оперативно приймемо заходи для усунення проблеми (067) 299-28-23
                    Заповніть рекламаційне звернення</p>
            </div>
            <div>
                <h5>ЗАНЕСЕННЯ ТА ЗБИРАННЯ МЕБЛІВ</h5>
                <p class="paragraph_content">
                    <span><b>Послуги занесення та збирання меблів – платні послуги</b></span></p>
                <p class="paragraph_content"><b>Вартість заносу меблів у квартиру</b> залежить від габаритів і ваги замовленого товару, а також від наявності або
                    відсутності ліфта і т.д</p>
                <p class="paragraph_content"><b>Вартість збирання меблів</b>Вартість збирання меблів залежить від виду товару, виробника та міста. Замовлення послуг занесення і складання
                    меблів в квартиру  обговорюється з менеджером під час оформлення замовлення.</p>
            </div>
        </div>
    </div>
    @livewire('hot-top-products-component')
</div>
