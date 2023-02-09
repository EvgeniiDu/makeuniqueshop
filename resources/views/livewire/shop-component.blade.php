@section('title')
    {{$category->title}}
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('shop', $category) }}
                </div>
            </div>
        </div>
    </div>
    <div class="_container container_with_filter">
        <div class="filter_block">
            <div class="widget mercado-widget filter-widget price-filter">
                <h2 class="filter_title">{{$category->title}}</h2>
                <div class="price_block">
                    <span>Ціна:</span>
                    <div class="price_range_slider">
                        <div class="price-input">
                            <div class="field">
                                <input type="number" class="input-min" value="{{$min_price}}">
                            </div>
                            <div class="field">
                                <input type="number" class="input-max" value="{{$max_price}}">
                            </div>
                        </div>
                        <div class="slider" wire:ignore>
                            <div class="progress"></div>
                        </div>
                        <div class="range-input" wire:ignore>
                            <input type="range" class="range-min" min="0" max="50000" value="{{$min_price}}" step="100">
                            <input type="range" class="range-max" min="0" max="50000" value="{{$max_price}}" step="100">
                        </div>
                    </div>

                </div>
            </div>
            <div class="header_block_filter mt-3">
                <div>
                    <span>Акція:</span>
                </div>
                <div>
                    <a href="#" id="button1"><img class="arrow_block1"
                                                  src="{{asset('assets/images/arrow_down_icon.png')}}"
                                                  alt=""></a>
                </div>
            </div>
            <div class="check_box_block сheckbox_area1">
                <div class="check_item">
                    <input class="checkbox-custom" name="sales" type="checkbox" value="hot"
                           wire:model="filter.hotSale">
                    <label class="checkbox-custom-label">Гарячі знижки</label>
                </div>
                <div class="check_item">
                    <input class="checkbox-custom" name="topSale" type="checkbox" value="1"
                           wire:model="filter.topSale">
                    <label class="checkbox-custom-label">Топ продажу</label>
                </div>
                <div class="check_item">
                    <input class="checkbox-custom" name="newProduct" type="checkbox" value="new"
                           wire:model="filter.newProduct">
                    <label class="checkbox-custom-label">Новинки</label>
                </div>
            </div>
            <div class="header_block_filter mt-3">
                <div>
                    <span>Наявність:</span>
                </div>
                <div>
                    <a href="#" id="button2"><img class="arrow_block2"
                                                  src="{{asset('assets/images/arrow_down_icon.png')}}"
                                                  alt=""></a>
                </div>
            </div>
            <div class="check_box_block сheckbox_area2">
                <div class="check_item">
                    <input class="checkbox-custom" name="instock" type="checkbox" value="instock"
                           wire:model="filter.instock">
                    <label class="checkbox-custom-label">В наявності</label>
                </div>
            </div>

            <div class="header_block_filter mt-3">
                <div>
                    <span>Матеріал:</span>
                </div>
                <div>
                    <a href="#" id="button3"><img class="arrow_block3"
                                                  src="{{asset('assets/images/arrow_down_icon.png')}}" alt=""></a>
                </div>
            </div>
            <div class="check_box_block сheckbox_area3">
                @foreach($materials as $material)
                    <div class="check_item">
                        <input class="checkbox-custom" name="material[]" type="checkbox" value="{{ $material }}"
                               wire:model="filter.materials">
                        <label class="checkbox-custom-label">{{ $material }}</label>
                    </div>
                @endforeach
            </div>
            <div class="header_block_filter mt-3">
                <div>
                    <span>Колір:</span>
                </div>
                <div>
                    <a href="#" id="button4"><img class="arrow_block4"
                                                  src="{{asset('assets/images/arrow_down_icon.png')}}" alt=""></a>
                </div>
            </div>
            <div class="check_box_block сheckbox_area4">
                @foreach($colors as $color)
                    <div class="check_item">
                        <input class="checkbox-custom" name="color[]" type="checkbox" value="{{$color->id}}"
                               wire:model="filter.color">
                        <label class="checkbox-custom-label">{{$color->title}}</label>
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
                    <div style="margin-left: 20px">
                        <p>Продукти не знайдено</p>
                    </div>
                @endif
            </div>
        </div>
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
        let priceGap = 1000;

        priceInput.forEach(input => {
            input.addEventListener("input", e => {
                let minPrice = parseInt(priceInput[0].value);
            @this.set('min_price', minPrice);
                let maxPrice = parseInt(priceInput[1].value);
            @this.set('max_price', maxPrice);
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
                let minVal = parseInt(rangeInput[0].value);
            @this.set('min_price', minVal);
                maxVal = parseInt(rangeInput[1].value);
            @this.set('max_price', maxVal);
                //console.log(minVal);
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
