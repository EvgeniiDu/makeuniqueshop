@section('title')
    Архітекторам та Дизайнерам
@endsection


<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('architectdesigner') }}
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
                    <li><a href="{{ route('afterwarranty') }}">Гарантійне і післягарантійне
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
                    <li><a href="{{route('architectdesigner')}}" style="text-decoration: underline; font-weight: 500;">Архітекторам
                            та дизайнерам</a></li>
                    <li><a href="{{route('manufecturer')}}">Виробники</a></li>
                    <li><a href="{{ route('vacancies') }}">Вакансії</a></li>
                    <li><a href="{{route('loyaltyprogram')}}">Програма лояльності</a></li>
                </ul>
            </div>
        </div>
        <div class="right_box">
            <h4>АРХІТЕКТОРАМ ТА ДИЗАЙНЕРАМ</h4>
            <div class="mt-4">
                <p style="font-weight: 500;font-size: 14px;">Використовуйте меблі MAKE UNIQUE в своїх роботах і
                    отримуйте від цього вигоду!</p>
            </div>
            <div class="mt-4">
                <p style="font-size: 14px;">Ми пропонуємо використовувати моделі наших меблів при роботі над дизайном
                    інтер’єрів та при підготовці візуалізації та рендерів майбутнього інтер’єру.</p>
            </div>
            <div class="mt-4">
                <p style="font-size: 14px;">Наш асортимент містить достатньо широкий вибір диванів, м’яких крісел, ліжок
                    та інших меблів, щоб застосовувати їх у візуалізаціях інтер’єрів у будь-якому стилі.</p>
            </div>
            <div class="mt-4">
                <p style="font-size: 14px;">Використання товарів <span style="font-weight: 500;font-size: 16px;">MAKE UNIQUE</span>
                    у роботі дизайнерів інтер’єру може стати
                    ідеальним прикладом стратегії <span style="font-weight: 500;font-size: 16px;">«WIN-WIN»</span>,
                    завдяки якій у результаті співпраці виграють усі: і
                    покупець, і дизайнер, і ми як виробник меблів.</p>
            </div>
            <div class="mt-4 card_box">
                <div class="card_item">
                    <div class="header_card">
                        <p style="font-weight: 500;font-size: 16px;">ПОКУПЕЦЬ (ЗАМОВНИК):</p>
                    </div>
                    <div class="content_card">
                        <p>отримує стильний інтер’єр та
                            якісні українські меблі за привабливою ціною;</p>
                    </div>
                </div>
                <div class="card_item">
                    <div class="header_card">
                        <p style="font-weight: 500;font-size: 16px;">АРХІТЕКТОР ТА ДИЗАЙНЕР</p>
                    </div>
                    <div class="content_card">
                        <p>отримує ефективний інструмент
                            у вигляді привабливих моделей
                            меблів та премію від MAKE UNIQUE
                            за залучених покупців та
                            здійснені покупки;</p>
                    </div>
                </div>
                <div class="card_item">
                    <div class="header_card">
                        <p style="font-weight: 500;font-size: 16px;">ВИРОБНИК:</p>
                    </div>
                    <div class="content_card">
                        <p>отримує нових покупців, які
                            у перспективі можуть стати постійними клієнтами.</p>
                    </div>
                </div>
            </div>
            <div class="application_container">
                <div class="left_box_application">
                    <div class="header_application">
                        <p style="font-size: 14px; line-height: 16px; font-weight: 300;"><span style="font-weight: 500;">Умови утримання премії (заохочення)</span> для архітекторів та
                            дизайнерів інтер’єрів можна обговорити індивідуально з
                            представниками <span style="font-weight: 400; font-size: 14px;">make unique</span>.<br>
                            Для цього заповніть форму і наш представник зв'яжеться з Вами
                            для обговорення деталей.
                        </p>
                    </div>
                    <div class="poster_application">
                        <img src="{{asset('assets/css/images/poster.jpg')}}" alt="">
                    </div>
                </div>
                <div class="right_box_application">
                    <form wire:submit.prevent="store">
                        <div class="input_block_application mt-2">
                            <label for="name">Ваше ім'я</label>
                            <input type="text" name="name" placeholder="Ваше ім'я" wire:model="name">
                        </div>
                        <div class="input_block_application">
                            <label for="phone">Телефон</label>
                            <input type="text" name="phone" placeholder="+38(___)-___-__-__" wire:model="phone">
                        </div>
                        <div class="input_block_application">
                            <label for="email">Email</label>
                            <input type="email" placeholder="Email" wire:model="email">
                        </div>
                        <div class="input_block_application">
                            <label for="message">Повідомлення</label>
                            <textarea placeholder="Введіть Ваше повідомлення" wire:model="message" rows="5" cols="33"></textarea>
                        </div>
                        <button type="submit" wire:click.prevent="store">ЗАЛИШИТИ ЗАЯВКУ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

