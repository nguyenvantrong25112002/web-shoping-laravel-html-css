@extends('frontend.layout')
@section('layout-conten')
    <div class="ps-product--detail pt-60">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-10 col-md-12 offset-1">
                    <div class="ps-product--detail">

                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="img_detail ">
                                    <div class="swiper  thumblist">
                                        <ul class="swiper-wrapper thumb_list ">
                                            <li data-img_pro='{{ asset("$URL_IMG_PRODUCT/$productDetai->img_product") }}'
                                                class="img_gallerys swiper-slide ">
                                                <div class="img_gallery"
                                                    style="background-image: url({{ asset("$URL_IMG_PRODUCT/$productDetai->img_product") }})">
                                                </div>
                                            </li>
                                            @foreach ($productDetai->hasManyGallery as $imgs)

                                                <li data-img_pro='{{ asset("$URL_IMG_GALLERY/$imgs->img_gallery") }}'
                                                    class="img_gallerys swiper-slide ">
                                                    <div class="img_gallery"
                                                        style="background-image: url({{ asset("$URL_IMG_GALLERY/$imgs->img_gallery") }})">
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                    <div class="img-main ps-owl-root">

                                        <div class="ps-owl--colection owl-slider owl-carousel" data-owl-auto="true"
                                            data-owl-loop="false" data-owl-speed="5000" data-owl-gap="30"
                                            data-owl-nav="false" data-owl-dots="false" data-owl-item="1"
                                            data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1"
                                            data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                                            <div class="img_main"
                                                style="background-image: url({{ asset("$URL_IMG_PRODUCT/$productDetai->img_product") }})">
                                            </div>
                                            @foreach ($productDetai->hasManyGallery as $imgs)
                                                <div style="background-image: url('{{ asset("$URL_IMG_GALLERY/$imgs->img_gallery") }}')"
                                                    class="img_main">
                                                </div>
                                            @endforeach


                                        </div>
                                        <div class="ps__owl-nav ps-owl-actions">
                                            <a class="ps__owl-nav_item ps-prev" href="#">
                                                <i class="icofont-stylish-left"></i>
                                            </a>
                                            <a class="ps__owl-nav_item ps-next" href="#">
                                                <i class="icofont-stylish-right"></i>
                                            </a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-6 col-md-8 col-lg-offset-0 ">
                                <div class="ps-product--hotdeal">
                                    <div class="ps-product__rating">

                                        <h1>{{ $productDetai->name_product }}</h1>
                                        <div class="ps-product__price">
                                            <div class="ps-product_price">
                                                {{ number_format($productDetai->pricesale_product, 0, ',', '.') }}
                                                <i class="icofont-dong"></i>
                                            </div>

                                            <del>
                                                {{ number_format($productDetai->price_product, 0, ',', '.') }}
                                                <i class="icofont-dong"></i>
                                            </del>

                                        </div>
                                        {{-- <div class="ps-product__block ps-product__quickview"> --}}
                                        <form data-id_form="{{ $productDetai->slug_product . $productDetai->id_product }}"
                                            class="add_to_cart" action="{{ route('web.cart_product.add') }}"
                                            method="POST">

                                            @csrf
                                            <input name="id_product" hidden readonly="true"
                                                value="{{ $productDetai->id_product }}" type="text">

                                            @foreach ($productAttributes as $productAttribute)
                                                <div class="ps-product__block ps-product__quicksize">
                                                    <h4>{{ $productAttribute->name }}</h4>
                                                    <ul>
                                                        @foreach ($productAttribute->hasManyAttributeVal as $attributeValue)
                                                            <li
                                                                class="input-quicksize @foreach ($productDetai->in_many_attr as $attrval)
                                        {{ $attributeValue->attrval_id == $attrval->attrval_id ? 'block' : '' }}
                                    @endforeach">
                                                                <input name="attrval_id"
                                                                    value="{{ $attributeValue->attrval_id }}"
                                                                    id="{{ $attributeValue->attrval_id . $attributeValue->value }}"
                                                                    type="radio" class="input_quicksize">
                                                                <label class="label_quicksize"
                                                                    for="{{ $attributeValue->attrval_id . $attributeValue->value }}">
                                                                    {{ $attributeValue->value }}</label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <p style="color: red;"
                                                        id="{{ $productDetai->slug_product . $productDetai->id_product }}"
                                                        class="ps-shoe__size_danger"></p>
                                                </div>
                                            @endforeach

                                            <div class="ps-product__shopping">
                                                <button type="submit" class="ps-btn mb-10">
                                                    Thêm giỏ hàng
                                                    <i class="ps-icon-next"></i>
                                                </button>
                                                <div class="ps-product__actions">
                                                    <a class="mr-10" href="whishlist.html">
                                                        <i class="ps-icon-heart"></i>
                                                    </a>
                                                    <a href="compare.html">
                                                        <i class="ps-icon-share"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-lg-offset-0 mt-5">
                                <div class="tile" id="tile-1">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-justified" role="tablist">
                                        <div class="slider"></div>
                                        <li class="nav-item">
                                            <a class="nav-link active" id="details_product-tab" data-toggle="tab"
                                                href="#details_product" role="tab" aria-controls="details_product"
                                                aria-selected="true">
                                                Chi tiết sản phẩm
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review"
                                                role="tab" aria-controls="review" aria-selected="false">
                                                Đánh giá
                                            </a>
                                        </li>

                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="details_product" role="tabpanel"
                                            aria-labelledby="details_product-tab">
                                            {!! $productDetai->details_product !!}

                                        </div>
                                        <div class="tab-pane fade" id="review" role="tabpanel"
                                            aria-labelledby="review-tab">
                                            <form class="ps-product__review" action="_action" method="post">
                                                <h4>Đánh giá của bạn</h4>
                                                <div class="row">

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                        <div class="rating-box">
                                                            <div class="rating-container">
                                                                <input type="radio" name="rating" value="5" id="star-5">
                                                                <label for="star-5">&#9733;</label>

                                                                <input type="radio" name="rating" value="4" id="star-4">
                                                                <label for="star-4">&#9733;</label>

                                                                <input type="radio" name="rating" value="3" id="star-3">
                                                                <label for="star-3">&#9733;</label>

                                                                <input type="radio" name="rating" value="2" id="star-2">
                                                                <label for="star-2">&#9733;</label>

                                                                <input type="radio" name="rating" value="1" id="star-1">
                                                                <label for="star-1">&#9733;</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nội dung:</label>
                                                            <textarea class="form-control" style="width:100%"
                                                                cols="100"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="ps-btn ps-btn--sm">Đánh giá<i
                                                                    class="ps-icon-next"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <p class="mb-20">1 review for <strong>Shoes Air Jordan</strong></p>
                                            <div class="ps-review">
                                                <div class="ps-review__content">
                                                    <div class="ps-review__thumbnail"><img
                                                            src="{{ asset('frontend/images/user/1.png') }}" alt="">
                                                    </div>
                                                    <header>

                                                        <p><a href=""> Alena Studio</a> - November 25, 2021</p>
                                                    </header>
                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim illum
                                                        dolore,
                                                        modi ut cupiditate eveniet numquam laborum! Commodi hic amet cum
                                                        incidunt
                                                        nesciunt minus reprehenderit temporibus magni. Ea, quae cumque.</p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                {{-- <div class="clearfix"></div>
                                <div class="ps-product__content mt-50">
                                    <ul class="tab-list" role="tablist">
                                        <li class="active">
                                            <a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Chi tiết
                                                sản
                                                phẩm</a>
                                        </li>
                                        <li>
                                            <a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Đánh
                                                giá</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="tab-content mb-60">
                                    <div class="tab-pane active" role="tabpanel" id="tab_01">
                                        {!! $productDetai->details_product !!}
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="tab_02">
                                        <p class="mb-20">1 review for <strong>Shoes Air Jordan</strong></p>
                                        <div class="ps-review">
                                            <div class="ps-review__content">
                                                <div class="ps-review__thumbnail"><img
                                                        src="{{ asset('frontend/images/user/1.png') }}" alt="">
                                                </div>
                                                <header>

                                                    <p><a href=""> Alena Studio</a> - November 25, 2021</p>
                                                </header>
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim illum
                                                    dolore,
                                                    modi ut cupiditate eveniet numquam laborum! Commodi hic amet cum
                                                    incidunt
                                                    nesciunt minus reprehenderit temporibus magni. Ea, quae cumque.</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <form class="ps-product__review" action="_action" method="post">
                                            <h4>Đánh giá của bạn</h4>
                                            <div class="row">

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <div class="rating-box">
                                                        <div class="rating-container">
                                                            <input type="radio" name="rating" value="5" id="star-5"> <label
                                                                for="star-5">&#9733;</label>

                                                            <input type="radio" name="rating" value="4" id="star-4"> <label
                                                                for="star-4">&#9733;</label>

                                                            <input type="radio" name="rating" value="3" id="star-3"> <label
                                                                for="star-3">&#9733;</label>

                                                            <input type="radio" name="rating" value="2" id="star-2"> <label
                                                                for="star-2">&#9733;</label>

                                                            <input type="radio" name="rating" value="1" id="star-1"> <label
                                                                for="star-1">&#9733;</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nội dung:</label>
                                                        <textarea class="form-control" style="width:100%"
                                                            cols="100"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="ps-btn ps-btn--sm">Đánh giá<i
                                                                class="ps-icon-next"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
            <div class="ps-container">
                <div class="ps-section__header mb-50">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <h3 class="ps-section__title" data-text="BEST SALE">- Sản phẩm được giảm giá</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <div class="ps-owl-actions">
                                <a class="ps-prev" href="#">
                                    <i class="ps-icon-arrow-right"></i> Prev
                                </a>
                                <a class="ps-next" href="#">
                                    Next<i class="ps-icon-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ps-section__content">
                    <div class="ps-owl--colection owl-slider owl-carousel" data-owl-auto="false" data-owl-loop="false"
                        data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4"
                        data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4"
                        data-owl-duration="1000" data-owl-mousedrag="on">
                        @php
                            $proCate_token = '_' . uniqid(5) . Str::random(5);
                        @endphp
                        {{-- @foreach ($productDetai->in_many_categorys as $category) --}}
                        {{-- @foreach ($category->in_many_products as $proCate) --}}
                        @foreach ($products as $proCate)

                            <div class="ps-shoe">
                                <div class="ps-shoe__top">
                                    <div class="ps-shoe__top-left">
                                        <a href="{{ route('web.product.detail', [$proCate->slug_product]) }}">
                                            <div style="background-image: url('{{ asset("$URL_IMG_PRODUCT/$proCate->img_product") }}');"
                                                class="ps-shoe__thumbnail">
                                            </div>
                                        </a>
                                        <ul class="ps-shoe__icon">
                                            <li class="ps-shoe__icon-item">
                                                <i class=" icofont-share"></i>
                                            </li>
                                            <li class="ps-shoe__icon-item">
                                                <i class=" icofont-heart-alt"></i>
                                            </li>
                                            <li class="ps-shoe__icon-item pro_id_car"
                                                data-pro_id_cart="{{ $proCate->slug_product . $proCate_token }}">
                                                <i class="icofont-brand-aliexpress"></i>
                                            </li>
                                        </ul>
                                        <a class="ps-buy_now" href="#">
                                            Mua ngay
                                        </a>

                                        <form
                                            data-id_form="{{ $proCate->slug_product . $proCate->id_product . $proCate_token }}"
                                            class="add_to_cart" action="{{ route('web.cart_product.add') }}"
                                            method="POST">
                                            @csrf
                                            <input name="id_product" hidden readonly="true"
                                                value="{{ $proCate->id_product }}" type="text">
                                            <div class="ps-shoe__size"
                                                id="{{ $proCate->slug_product . $proCate_token }}">
                                                <div class="ps-shoe__size-top">
                                                    <h5>Chọn kích cỡ</h5>
                                                    <div data-pro_id_cart_close="{{ $proCate->slug_product . $proCate_token }}"
                                                        class="ps-shoe__size-top_close">
                                                        <i class="icofont-ui-close"></i>
                                                    </div>
                                                </div>
                                                @foreach ($productAttributes as $productAttribute)
                                                    <div class="ps-product__quicksize ">
                                                        <ul>
                                                            @foreach ($productAttribute->hasManyAttributeVal as $attributeValue)
                                                                <li
                                                                    class="input-quicksize @foreach ($proCate->in_many_attr as $attrval)
                                                                    {{ $attributeValue->attrval_id == $attrval->attrval_id ? 'block' : '' }}
                                                                @endforeach">
                                                                    <input name="attrval_id"
                                                                        value="{{ $attributeValue->attrval_id }}"
                                                                        id="{{ $attributeValue->attrval_id . $attributeValue->value . $proCate->slug_product }}"
                                                                        type="radio" class="input_quicksize">
                                                                    <label class="label_quicksize"
                                                                        for="{{ $attributeValue->attrval_id . $attributeValue->value . $proCate->slug_product }}">
                                                                        {{ $attributeValue->value }}</label>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                @endforeach
                                                <p id="{{ $proCate->slug_product . $proCate->id_product . $proCate_token }}"
                                                    class="ps-shoe__size_danger"></p>
                                                <button type="submit" class="ps-shoe__cart">
                                                    <i class="icofont-brand-aliexpress"></i>
                                                    Thêm giỏ hàng
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="ps-shoe__top-right">
                                        <div class="ps-badge ps-badge--new">
                                            <span>New</span>
                                        </div>
                                        @if ($proCate->saleoff_product)
                                            <div class="ps-badge ps-badge--sale ps-badge--2nd">
                                                <span>{{ $proCate->saleoff_product }} %</span>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="ps-shoe__content">
                                    <a class="ps-shoe__name"
                                        href="{{ route('web.product.detail', [$proCate->slug_product]) }}">
                                        {{ $proCate->name_product }}
                                    </a>
                                    <div class="ps-shoe__price">
                                        <h4>
                                            {{ number_format($proCate->pricesale_product, 0, ',', '.') }}
                                            <i class="icofont-dong"></i>
                                        </h4>
                                        @if ($proCate->saleoff_product)
                                            <del>
                                                {{ number_format($proCate->price_product, 0, ',', '.') }}
                                                <i class="icofont-dong"></i>
                                            </del>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- @endforeach --}}
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('javascrip.web')
        <script>
            var swiper1 = new Swiper(".thumblist", {
                direction: "vertical",
                // spaceBetween: 3,
                slidesPerView: 5,
                mousewheel: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },

            });

            $('.img_gallerys').mouseover(function(e) {
                e.preventDefault();
                var img_gallerys = $(this).attr('data-img_pro');
                $('.img-main .owl-item.active .img_main').css('background-image', 'url(' + img_gallerys + ')').fadeIn(
                    1000);
            });
            $('.img_gallery').hover(function() {

                $(this).removeClass('active');

            }, function() {
                $(this).addClass('active');
            });
        </script>


    @endsection
