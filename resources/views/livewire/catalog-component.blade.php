@section('title')
    Каталог
@endsection

<div class="catalog_products">
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <span>{{ $categories[0]->title }}</span>
            </div>
        </div>
    </div>
    <div class="catalog_content">
        <div class="image_block">
            <img src="{{asset('assets/images/products/table_img.jpg')}}" alt="">
        </div>
        <div class="description_block_right">
            <div class="title_product">
                <span>{{ $categories[0]->title }}</span>
            </div>
            <div class="description_product">
                <p>Виготовлені з екологічно чистого масиву дуба, мають
                    міцну і надійну конструкцію. Ви можете вибрати колір
                    вироби, а також тип стільниці (вирощену по довжині або
                    суцільну). Ми гарантуємо високу якість і довговічність.</p>
            </div>
            <div class="border_btn_review_right">
                <a href="{{ route('shop', ['slug' => $categories[0]->slug]) }}" class="btn_link">ПЕРЕГЛЯНУТИ</a>
            </div>
        </div>
    </div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <span>Стільці</span>
            </div>
        </div>
    </div>
    <div class="catalog_content">
        <div class="description_block_left">
            <div class="title_product">
                <span>СТІЛЬЦІ</span>
            </div>
            <div class="description_product">
                <p>Виготовлені з екологічно чистого масиву дуба, мають
                    міцну і надійну конструкцію. Ви можете вибрати колір
                    вироби, а також тип стільниці (вирощену по довжині або
                    суцільну). Ми гарантуємо високу якість і довговічність.</p>
            </div>
            <div class="border_btn_review_left">
                <a href="{{ route('shop', ['slug' => $categories[1]->slug]) }}" class="btn_link">ПЕРЕГЛЯНУТИ</a>
            </div>
        </div>
        <div class="image_block">
            <img src="{{asset('assets/images/products/chair_img.jpg')}}" alt="">
        </div>
    </div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <span>Корпусні меблі</span>
            </div>
        </div>
    </div>
    <div class="catalog_content">
        <div class="image_block">
            <img src="{{asset('assets/images/products/corpus_furnitur.jpg')}}" alt="">
        </div>
        <div class="description_block_right">
            <div class="title_product">
                <span>КОРПУСНІ МЕБЛІ</span>
            </div>
            <div class="description_product">
                <p>Виготовлені з екологічно чистого масиву дуба, мають
                    міцну і надійну конструкцію. Ви можете вибрати колір
                    вироби, а також тип стільниці (вирощену по довжині або
                    суцільну). Ми гарантуємо високу якість і довговічність.</p>
            </div>
            <div class="border_btn_review_right">
                <a href="{{ route('shop', ['slug' => $categories[2]->slug]) }}" class="btn_link">ПЕРЕГЛЯНУТИ</a>
            </div>
        </div>
    </div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <span>Ліжка</span>
            </div>
        </div>
    </div>
    <div class="catalog_content">
        <div class="description_block_left">
            <div class="title_product">
                <span>ЛІЖКА</span>
            </div>
            <div class="description_product">
                <p>Виготовлені з екологічно чистого масиву дуба, мають
                    міцну і надійну конструкцію. Ви можете вибрати колір
                    вироби, а також тип стільниці (вирощену по довжині або
                    суцільну). Ми гарантуємо високу якість і довговічність.</p>
            </div>
            <div class="border_btn_review_left">
                <a href="{{ route('shop', ['slug' => $categories[3]->slug]) }}" class="btn_link">ПЕРЕГЛЯНУТИ</a>
            </div>
        </div>
        <div class="image_block">
            <img src="{{asset('assets/images/products/bed_img.jpg')}}" alt="">
        </div>
    </div>
</div>
