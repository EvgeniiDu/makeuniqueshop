@section('title')
    Результат пошуку
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('product.search') }}
                </div>
            </div>
        </div>
    </div>
    <div class="_container container_with_filter">
        @if($products->count() > 0)
                <div class="filter_block">
                    <div class="widget mercado-widget filter-widget price-filter">
                        <h2 class="filter_title">Результат</h2>
                    </div>
                    <div class="header_block_filter">
                        <div>
                            <span>Категорія:</span>
                        </div>
                        <div>
                            <a href="#" id="button3"><img class="arrow_block3"
                                                          src="{{asset('assets/images/arrow_down_icon.png')}}"
                                                          alt=""></a>
                        </div>
                    </div>
                    <div class="check_box_block сheckbox_area3">
                        @foreach($categories as $category)
                            <div class="check_item">
                                <input class="checkbox-custom" name="category[]" type="checkbox"
                                       value="{{ $category->id }}" wire:model="filter.categories">
                                <label class="checkbox-custom-label">{{ $category->title }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            <div class="catalog_sorting_box">
                <div class="sort-item orderby ">
                    <select name="orderby" class="use-chosen" wire:model="sorting">
                        <option value="menu_order" selected="selected">За замовчуванням</option>
                        <option value="title">Найменування</option>
                        <option value="regular_price">Ціна(зростаючий)</option>
                        <option value="price-desc">Ціна(спадаючий)</option>
                    </select>
                </div>
                <div class="catalog_items">
                    @php
                        $wishItems = Cart::instance('wishlist')->content()->pluck('id')
                    @endphp
                    @if($products[0] != null)
                        @foreach($products as $product)
                            <div class="item">
                                <div class="image_product scale_img">
                                    @if($product->sale_price != null)
                                        <div class="icon_product">
                                            <img src="{{asset('assets/images/hot_icon.png')}}" alt="">
                                        </div>
                                    @endif
                                    @if($product->top_sales != 0)
                                        <div class="icon_product">
                                            <img src="{{asset('assets/images/top_icon.png')}}" alt="">
                                        </div>
                                    @endif
                                    @if($product->new_product == 'new')
                                        <div class="icon_product">
                                            <img src="{{asset('assets/images/news_icon.png')}}" alt="">
                                        </div>
                                    @endif
                                    <a href="{{ route('product.details', ['prodSlug' => $product->slug]) }}"><img
                                            src="{{asset('assets/images/products')}}/{{$product->image}}" alt=""></a>
                                </div>
                                <div class="descrip_product">
                                    <div class="title_prod">
                                        <a href="{{ route('catalog.details', [$category->slug, 'prodSlug' => $product->slug]) }}">{{ $product->title }}</a>
                                    </div>
                                    <div class="info_div_box">
                                        <div class="info_div">
                                            <label for="color">Колір:</label>
                                            <span class="info_span" id="color">{{$product->color->title }}</span>
                                        </div>
                                        <div class="info_div">
                                            <label for="cover">Матеріал:</label>
                                            <span class="info_span" id="cover">{{ $product->material }}</span>
                                        </div>
                                        <div class="info_div">
                                            <label for="size">Розмір:</label>
                                            <span class="info_span" id="size">{{ $product->length }}x{{ $product->width }}x{{ $product->height }}h</span>
                                        </div>
                                    </div>
                                    @if($product->sale_price)
                                        <div class="price_old_box">
                                            <span>{{ number_format($product->regular_price, 0, '', ' ') }}грн</span>
                                        </div>
                                    @endif
                                    <div class="price_prod">
                                        <div class="wish_product">
                                            @if( $wishItems->contains($product->id))
                                                <a href="#" wire:click.prevent="removeFromWishlist({{ $product->id}})"><i
                                                        class="fa fa-heart fill_heart"></i></a>
                                            @else
                                                <a href="#"
                                                   wire:click.prevent="addToWishlist({{ $product->id}}, '{{ $product->title }}', {{$product->sale_price ?? $product->regular_price}} )"><i
                                                        class="fa fa-heart"></i></a>
                                            @endif
                                        </div>
                                        <div class="cart_icon_box">
                                            <a href=""
                                               wire:click.prevent="store({{ $product->id}}, '{{ $product->title }}', {{$product->sale_price ?? $product->regular_price}} )"><img
                                                    src="{{asset('assets/images/cart_icon.png')}}" alt=""></a>
                                        </div>
                                        <div class="main_price_box">
                                            <span class="label_price">Ціна:</span>
                                            <span class="info_span price_cost">{{ number_format($product->sale_price ?? $product->regular_price, 0, '', ' ') }}грн</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div>
                            <p>Продукти не знайдено</p>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="not_found_container mt-5">
                <p>За запитом <b>{{$search}}</b> нічого не знайдено</p>
            </div>
        @endif
    </div>
    <div class="paginate_line_container">
        {{ $products->withQueryString()->links('pagination-links') }}
    </div>
</div>

@push('scripts')
    <script>
        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".slider .progress");
        let priceGap = 100;
        priceInput.forEach(input => {
            input.addEventListener("input", e => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });
        rangeInput.forEach(input => {
            input.addEventListener("input", e => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);
                if ((maxVal - minVal) < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });
    </script>
@endpush
