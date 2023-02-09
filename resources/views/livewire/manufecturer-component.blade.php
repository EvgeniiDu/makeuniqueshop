@section('title')
    Виробники
@endsection


<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('manufecturer') }}
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
                    <li><a href="{{route('manufecturer')}}" style="text-decoration: underline; font-weight: 500;">Виробники</a></li>
                    <li><a href="{{ route('vacancies') }}">Вакансії</a></li>
                    <li><a href="{{route('loyaltyprogram')}}">Програма
                            лояльності</a></li>
                </ul>
            </div>
        </div>
        <div class="right_box">
            <div class="certified_container">
                <h4>MEBEL-STAR</h4>
                <div class="mt-4 popup-gallery">
                    <a href="{{asset('assets/images/certificates/cert1.jpg')}}"><img src="{{asset('assets/images/certificates/cert1.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert2.jpg')}}"><img src="{{asset('assets/images/certificates/cert2.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert3.jpg')}}"><img src="{{asset('assets/images/certificates/cert3.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert4.jpg')}}"><img src="{{asset('assets/images/certificates/cert4.jpg')}}"></a>
                </div>
                <h4 class="mt-4">VIP MASTER</h4>
                <div class="mt-4 popup-gallery">
                    <a href="{{asset('assets/images/certificates/cert5.jpg')}}"><img src="{{asset('assets/images/certificates/cert5.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert6.jpg')}}"><img src="{{asset('assets/images/certificates/cert6.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert7.jpg')}}"><img src="{{asset('assets/images/certificates/cert7.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert8.jpg')}}"><img src="{{asset('assets/images/certificates/cert8.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert9.jpg')}}"><img src="{{asset('assets/images/certificates/cert9.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert10.jpg')}}"><img src="{{asset('assets/images/certificates/cert10.jpg')}}"></a>
                </div>
                <h4 class="mt-4">КИЇВСЬКИЙ СТАНДАРТ</h4>
                <div class="mt-4 popup-gallery">
                    <a href="{{asset('assets/images/certificates/cert11.jpg')}}"><img src="{{asset('assets/images/certificates/cert11.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert12.jpg')}}"><img src="{{asset('assets/images/certificates/cert12.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert13.jpg')}}"><img src="{{asset('assets/images/certificates/cert13.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert8.jpg')}}"><img src="{{asset('assets/images/certificates/cert8.jpg')}}"></a>
                </div>
                <h4 class="mt-4">MEBIGRAND</h4>
                <div class="mt-4 popup-gallery">
                    <a href="{{asset('assets/images/certificates/cert6.jpg')}}"><img src="{{asset('assets/images/certificates/cert6.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert7.jpg')}}"><img src="{{asset('assets/images/certificates/cert7.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert2.jpg')}}"><img src="{{asset('assets/images/certificates/cert2.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert10.jpg')}}"><img src="{{asset('assets/images/certificates/cert10.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert1.jpg')}}"><img src="{{asset('assets/images/certificates/cert1.jpg')}}"></a>
                </div>
                <h4 class="mt-4">СВІТ МЕБЛІВ</h4>
                <div class="mt-4 popup-gallery">
                    <a href="{{asset('assets/images/certificates/cert9.jpg')}}"><img src="{{asset('assets/images/certificates/cert9.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert3.jpg')}}"><img src="{{asset('assets/images/certificates/cert3.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert7.jpg')}}"><img src="{{asset('assets/images/certificates/cert7.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert13.jpg')}}"><img src="{{asset('assets/images/certificates/cert13.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert2.jpg')}}"><img src="{{asset('assets/images/certificates/cert2.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert11.jpg')}}"><img src="{{asset('assets/images/certificates/cert11.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert5.jpg')}}"><img src="{{asset('assets/images/certificates/cert5.jpg')}}"></a>
                </div>
                <h4 class="mt-4">NOVELTY</h4>
                <div class="mt-4 popup-gallery">
                    <a href="{{asset('assets/images/certificates/cert11.jpg')}}"><img src="{{asset('assets/images/certificates/cert11.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert12.jpg')}}"><img src="{{asset('assets/images/certificates/cert12.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert8.jpg')}}"><img src="{{asset('assets/images/certificates/cert8.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert9.jpg')}}"><img src="{{asset('assets/images/certificates/cert9.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert10.jpg')}}"><img src="{{asset('assets/images/certificates/cert10.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert1.jpg')}}"><img src="{{asset('assets/images/certificates/cert1.jpg')}}"></a>
                </div>
                <h4 class="mt-4">RICHMAN</h4>
                <div class="mt-4 popup-gallery">
                    <a href="{{asset('assets/images/certificates/cert7.jpg')}}"><img src="{{asset('assets/images/certificates/cert7.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert2.jpg')}}"><img src="{{asset('assets/images/certificates/cert2.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert10.jpg')}}"><img src="{{asset('assets/images/certificates/cert10.jpg')}}"></a>
                    <a href="{{asset('assets/images/certificates/cert9.jpg')}}"><img src="{{asset('assets/images/certificates/cert9.jpg')}}"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.popup-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                tLoading: 'Loading image #%curr%...',
                mainClass: 'mfp-img-mobile',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                },
                image: {
                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                }
            });
        });
    </script>
@endpush
