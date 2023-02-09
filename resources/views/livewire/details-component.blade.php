@section('title')
    Про товар
@endsection

<div>
    <div class="catalog_products_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('product.details', $category, $product) }}
                </div>
            </div>
        </div>
    </div>
    <div class="details_info_container">
        @php
            $wishItems = Cart::instance('wishlist')->content()->pluck('id')
        @endphp
        <div class="detail_info">
            <div class="detail_image_block" wire:ignore>
                <div class="image_big">
                    <img id="imageBig" class="detail_image"
                         src="{{ asset('assets/images/products') }}/{{ $product->image }}" alt="">
                </div>
                <div class="product_gallery">
                    <div class="owl-carousel owl-carousel-gallery-products owl-theme" wire:ignore>
                        @foreach($images as $image)
                            <div class="item image_item">
                                <img class="image_product_more" id="currentImage"
                                     src="{{ asset('assets/images/products') }}/{{ $image->path}}"
                                     alt="" onclick="scaleImage(this)"/>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="detail_description">
                    <div class="header_description">
                        <span>Детальний опис</span>
                    </div>
                    <div class="description">
                        {{$product->description}}
                    </div>
                    <button class="read_description_btn btn_hide">Читати повністю</button>
                </div>
            </div>
            <div class="description_product_container">
                <div class="header_detail">
                    <div class="header_detail_title">
                        <span>{{ $product->title }}</span>
                    </div>
                    <div class="header_detail_stock_status_and_sku">
                        <div class="header_detail_box">
                            <div class="header_detail_stock_status">
                                @if($product->stock_status == 'instock')
                                    <span class="instock">В наявності</span>
                                @else
                                    <span class="outstock">Немає в наявності</span>
                                @endif
                            </div>
                            <div class="header_detail_sku">
                                <label>Код продукту:</label>
                                <span>{{$product->SKU}}</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="price_and_cart_container">
                    @if($product->sale_price)
                        <div class="old_price">
                            <span
                                class="old_regular_price">{{number_format($product->regular_price, 0, '', ' ')}}грн</span>
                            <label class="save_money">Економ</label>
                            <span class="save_money">{{number_format($product->regular_price-$product->sale_price, 0, '', ' ')}}грн</span>
                        </div>
                        <div class="regular_price">
                            <div class="regular_price_box">
                                <label>Ціна:</label>
                                <span>{{number_format($product->sale_price, 0, '', ' ')}}грн</span>
                            </div>
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
                        </div>
                    @else
                        <div class="regular_price">
                            <label>Ціна:</label>
                            <span>{{number_format($product->regular_price, 0, '', ' ')}}грн</span>
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
                        </div>
                    @endif
                    <div class="cart_button_container">
                        <div class="cart_button">
                            <button
                                wire:click.prevent="store({{ $product->id}}, '{{ $product->title }}', {{$product->sale_price ?? $product->regular_price}} )">
                                додати в кошик
                            </button>
                        </div>
                    </div>
                </div>
                <div class="proportions_colors_container">
                    <div class="proportions_container">
                        <div class="labels_column">
                            <div class="label_row">
                                <label>Покриття:</label>
                            </div>
                            <div class="label_row">
                                <label>Матеріал:</label>
                            </div>
                            <div class="label_row">
                                <label>Висота:</label>
                            </div>
                            <div class="label_row">
                                <label>Ширина:</label>
                            </div>
                            <div class="label_row">
                                <label>Довжина:</label>
                            </div>
                            @if( $product->tabletop)
                                <div class="label_row">
                                    <label>Стільниця:</label>
                                </div>
                            @endif
                            @if( $product->filling)
                                <div class="label_row">
                                    <label>Наповнювач матрацу:</label>
                                </div>
                            @endif
                            <div class="label_row">
                                <label>Колір:</label>
                            </div>
                        </div>
                        <div class="proportions_column">
                            <div class="proportion_row">
                                <span>{{ $product->coating }}</span>
                            </div>
                            <div class="proportion_row">
                                <span>{{ $product->material }}</span>
                            </div>
                            <div class="proportion_row">
                                <span>{{ $product->height }} мм</span>
                            </div>
                            <div class="proportion_row">
                                <span>{{ $product->width }} мм</span>
                            </div>
                            <div class="proportion_row">
                                <span>{{ $product->length }} мм</span>
                            </div>
                            @if( $product->tabletop)
                                <div class="proportion_row">
                                    <span>{{ $product->tabletop }}</span>
                                </div>
                            @endif
                            @if( $product->filling)
                                <div class="proportion_row">
                                    <span>{{ $product->filling }}</span>
                                </div>
                            @endif
                            <div class="proportion_row_color">
                                @foreach($colors as $color)
                                    <div class="color_item">
                                        <label>
                                            <input type="radio" name="color" value="{{$color->title}}"
                                                   wire:model="color_title">
                                            <img src="{{asset('assets/images/colors')}}/{{$color->image}}" alt=""
                                                 width="44px">
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('offered-products-component')
</div>

@push('scripts')
    <script>
        let buttonDescription = document.querySelector(".read_description_btn");
        buttonDescription.classList.remove('btn_hide');
        buttonDescription.onclick = function () {
            (buttonDescription.innerHTML === 'Читати повністю') ? buttonDescription.innerHTML = 'Згорнути' : buttonDescription.innerHTML = 'Читати повністю';
            document.querySelector(".description").classList.toggle('open');
            return false;

        }

        function scaleImage(smallImg) {
            let arrayImg = document.getElementsByClassName('image_product_more')
            for (let i = 0; i < arrayImg.length; i++) {
                if (arrayImg[i].currentSrc == smallImg.src) {
                    arrayImg[i].style.opacity = 1
                } else {
                    arrayImg[i].style.opacity = 0.5
                }
            }
            let bigImg = document.getElementById('imageBig');
            bigImg.src = smallImg.src;

        }
    </script>
@endpush
