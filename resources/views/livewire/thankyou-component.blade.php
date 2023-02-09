@section('title')
    Дякуємо
@endsection



<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('thankyou') }}
                </div>
            </div>
        </div>
    </div>
    <div class="thankyou_container">
            <div class="col-md-12 text-center mt-5">
                <h2>Дякуємо за замовлення!</h2>
                <p class="mt-4">Інформацію щодо замовлення, відправлено на Вашу пошту <b>{{Auth::user()->email}}</b>.</p>
                <p>Через деякий час з Вами зв'яжеться менеджер, для підтвердження замовлення</p>
            </div>
            <div class="continue_order_btn_box mt-5">
                <div class="continue_shopping_btn">
                    <a href="{{route('catalog')}}">продовжити покупки</a>
                </div>
            </div>
        <div class="thankyou_logo_box">
            <div class="logo_block_profile">
                <div class="logo_row_make">
                    <img src="{{asset('assets/images/logo/MakeUnique.png')}}" alt="">
                </div>
            </div>
        </div>
    </div><!--end container-->

</div>
