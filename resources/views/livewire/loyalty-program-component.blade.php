@section('title')
    Програма лояльності
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('loyaltyprogram') }}
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
                    <li><a href="{{route('afterwarranty')}}">Гарантійне і післягарантійне
                            обслуговування</a></li>
                    <li><a href="{{route('certifiedgood')}}">Сертифіковані товари</a></li>
                    <li><a href="{{route('about')}}">Про нас</a>
                    </li>
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
                    <li><a href="{{ route('vacancies') }}">Вакансії</a></li>
                    <li><a href="{{route('loyaltyprogram')}}" style="text-decoration: underline; font-weight: 500;">Програма
                            лояльності</a></li>
                </ul>
            </div>
        </div>
        <div class="right_box">
            <h4>ПРОГРАМА ЛОЯЛЬНОСТІ</h4>
            <div class="mt-4">
                <p>Як і будь-яка інша компанія, яка цінує своїх постійних клієнтів і піклується про них, ми розробили
                    власну програму лояльності. У таких питаннях надмірна складність недоцільна, тому ми вирішили просто
                    відкладати гроші від кожної покупки на особистому рахунку клієнта, щоб їх можна було витратити в
                    майбутньому.</p>
            </div>
            <div class="mt-4">
                <p style="font-weight: 500;font-size: 16px;">Принцип простий:</p>
                <p>КУПУЄТЕ <img src="{{asset('assets/images/arrow_loyality.png')}}" alt=""> ВІДКЛАДАЄТЕ <img
                        src="{{asset('assets/images/arrow_loyality.png')}}" alt=""> ВИТРАЧАЄТЕ ВІДКЛАДЕНЕ НА НОВІ ТОВАРИ
                </p>
            </div>
            <div class="mt-4">
                <p>Кожному покупцеві, який реєструється в нашій системі і купує меблі <span
                        style="font-weight: 500;font-size: 16px;">MAKE UNIQUE</span> через Інтернет, ми
                    відкриваємо бонусний рахунок. На нього зараховуються кошти в розмірі 3% від суми кожної покупки,
                    зробленої в нашому інтернет-магазині.<br>
                    Цей <span style="font-weight: 500;font-size: 16px;">БОНУС</span> - це своєрідний «CASHBACK» від
                    <span style="font-weight: 500;font-size: 16px;">MAKE UNIQUE</span>, який не можна отримати готівкою
                    на руки, але
                    можна відкласти і використовувати на покупку нових меблів або аксесуарів в майбутньому.</p>
            </div>
            <div class="mt-4">
                <p style="font-weight: 500;font-size: 16px;">Як користуватися послугою?</p>
                <p>Щоб скористатися такою можливістю, вам не потрібно оформляти
                    заявок або чого-небудь подібного. досить просто зареєструватися в системі. кожен покупець, який
                    замовляє меблі в інтернет-магазині <span
                        style="font-weight: 500;font-size: 16px;">MAKE UNIQUE</span>, автоматично стає учасником цієї
                    програми
                    лояльності..
                </p>
                <p>3% накопичуються на вашому особистому рахунку за результатами кожної покупки.</p>
            </div>
            <div class="pay_description mt-4">
                <p>При здійсненні наступної покупки ви можете вибрати один з двох варіантів:</p>
                <ul class="mt-4">
                    <li>Використовувати бонуси;</li>
                    <li>Продовжувати накопичувати.</li>
                </ul>
            </div>
            <div class="mt-4">
                <p style="font-size: 18px; color: #FD5252">ВАЖЛИВО!</p>
                <p>Наші (тобто ваші) <span style=" color: #FD5252">бонусні кошти не згорають</span> - ми не прив'язуємо
                    їх до визначеного терміну дії. Це означає, що отримавши їх при оплаті за м'яке крісло зараз, ви
                    зможете витратити їх через рік, два або навіть три, коли вирішите купити собі нове крісло. Або через
                    тиждень, після того, як по-справжньому оціните якість наших виробів і захочете більше меблів
                    <span style="font-weight: 500;font-size: 16px;">MAKE UNIQUE</span> в своєму будинку.
                </p>
                <p><span
                        style="font-weight: 500;">Бонуси діють тільки при покупці товарів в нашому інтернет-магазині</span>.
                    Їх не можна витратити на покупку товарів
                    <span style="font-weight: 500;font-size: 16px;">MAKE UNIQUE</span> в звичайних меблевих магазинах.
                </p>
                <p>Бонуси - це не реальні кошти, їх <span style=" color: #FD5252">не можна отримати готівкою</span> на
                    руки або розрахуватися ними за покупки в інших інтернет-магазинах.</p>
            </div>
        </div>
    </div>
</div>

