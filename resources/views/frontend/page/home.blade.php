@extends('frontend.layout')

@section('layout-conten')
    {{-- {{ Auth::guard('customer')->user()->name_customer }} --}}




    @isset($bannerHome)
        @include('frontend.include.banner', ['bannerHome' => $bannerHome])
    @endisset

    <div class="pt-50">
        <div class="ps-section__header mb-50">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-text="new product">- Sản phẩm mới</h3>
                </div>
            </div>
        </div>
        @php
            $productHomeItem_token = Str::random(5) . rand(0001, 9999) . '_' . Str::random(5);
        @endphp
        <div class="row row-cols-1">

            @foreach ($productHome as $productHomeItem)
                <div class="col-lg-3 col-xs-12 col-md-12 col-sm-6 ">
                    <div class="ps-shoe mb-30">
                        <div class="ps-shoe__top">
                            <div class="ps-shoe__top-left">
                                <a href="{{ route('web.product.detail', [$productHomeItem->slug_product]) }}">
                                    <div style="background-image: url('{{ asset("$URL_IMG_PRODUCT/$productHomeItem->img_product") }}');"
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
                                        data-pro_id_cart="{{ $productHomeItem->slug_product . $productHomeItem_token }}">
                                        <i class="icofont-brand-aliexpress"></i>
                                    </li>
                                </ul>
                                <a class="ps-buy_now" href="#">
                                    Mua ngay
                                </a>
                                <form
                                    data-id_form="{{ $productHomeItem->slug_product . $productHomeItem->id_product . $productHomeItem_token }}"
                                    class="add_to_cart" action="{{ route('web.cart_product.add') }}" method="POST">
                                    @csrf

                                    <input name="id_product" hidden readonly="true"
                                        value="{{ $productHomeItem->id_product }}" type="text">
                                    <div class="ps-shoe__size"
                                        id="{{ $productHomeItem->slug_product . $productHomeItem_token }}">
                                        <div class="ps-shoe__size-top">
                                            <h5>Chọn kích cỡ</h5>
                                            <div data-pro_id_cart_close="{{ $productHomeItem->slug_product . $productHomeItem_token }}"
                                                class="ps-shoe__size-top_close">
                                                <i class="icofont-ui-close"></i>
                                            </div>
                                        </div>
                                        @foreach ($productAttributes as $productAttribute)
                                            <div class="ps-product__quicksize">
                                                <ul>
                                                    @foreach ($productAttribute->hasManyAttributeVal as $attributeValue)
                                                        <li
                                                            class="input-quicksize  @foreach ($productHomeItem->in_many_attr as $attrval) {{ $attributeValue->attrval_id == $attrval->attrval_id ? 'block' : '' }} @endforeach">

                                                            <input name="attrval_id"
                                                                value="{{ $attributeValue->attrval_id }}"
                                                                id="{{ $attributeValue->attrval_id . $attributeValue->value . $productHomeItem->slug_product }}"
                                                                type="radio" class="input_quicksize">
                                                            <label class="label_quicksize"
                                                                for="{{ $attributeValue->attrval_id . $attributeValue->value . $productHomeItem->slug_product }}">
                                                                {{ $attributeValue->value }}</label>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        @endforeach
                                        <p id="{{ $productHomeItem->slug_product . $productHomeItem->id_product . $productHomeItem_token }}"
                                            class="ps-shoe__size_danger"></p>
                                        <button class="ps-shoe__cart" type="submit">
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
                                @if ($productHomeItem->saleoff_product)
                                    <div class="ps-badge ps-badge--sale ps-badge--2nd">
                                        <span>{{ $productHomeItem->saleoff_product }} %</span>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="ps-shoe__content">

                            <a class="ps-shoe__name"
                                href="{{ route('web.product.detail', [$productHomeItem->slug_product]) }}">
                                {{ $productHomeItem->name_product }}
                            </a>


                            <div class="ps-shoe__price">
                                <h4>
                                    {{ number_format($productHomeItem->pricesale_product, 0, ',', '.') }}
                                    <i class="icofont-dong"></i>
                                </h4>
                                @if ($productHomeItem->saleoff_product)
                                    <del>
                                        {{ number_format($productHomeItem->price_product, 0, ',', '.') }}
                                        <i class="icofont-dong"></i>
                                    </del>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="ps-section--offer">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <img src="{{ asset('frontend/images/banner/home-banner-5.png') }}" alt="">
            </div>
        </div>
    </div>

    {{-- @include('frontend.include.fashion_style') --}}
    {{-- <div class="ps-section--offer">
        <div class="ps-column">
            <a class="ps-offer" href="product-listing.html"><img
                    src="{{ asset('frontend/images/banner/home-banner-3.png') }}" alt=""></a>
        </div>
        <div class="ps-column">
            <a class="ps-offer" href="product-listing.html"><img
                    src="{{ asset('frontend/images/banner/home-banner-4.png') }}" alt=""></a>
        </div>
    </div> --}}

    <div class="ps-section ps-section--top-sales ps-owl-root ">
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

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ps-owl--colection owl-slider owl-carousel" data-owl-auto="true" data-owl-loop="false"
                    data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4"
                    data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4"
                    data-owl-duration="1000" data-owl-mousedrag="on">

                    @php
                        $stt = 0;
                        $productHomeSaleItem_token = Str::random(5) . rand(0001, 9999) . '_' . Str::random(5);
                        
                    @endphp
                    @foreach ($productHomeSale as $productHomeSaleItem)
                        <div class="ps-shoe">
                            <div class="ps-shoe__top">
                                <div class="ps-shoe__top-left">
                                    <a href="{{ route('web.product.detail', [$productHomeSaleItem->slug_product]) }}">
                                        <div style="background-image: url('{{ asset("$URL_IMG_PRODUCT/$productHomeSaleItem->img_product") }}');"
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
                                            data-pro_id_cart="{{ $productHomeSaleItem->slug_product . $productHomeSaleItem_token }}">
                                            <i class="icofont-brand-aliexpress"></i>
                                        </li>
                                    </ul>
                                    <a class="ps-buy_now" href="#">
                                        Mua ngay
                                    </a>

                                    <form
                                        data-id_form="{{ $productHomeSaleItem->slug_product . $productHomeSaleItem->id_product . $productHomeSaleItem_token }}"
                                        class="add_to_cart" action="{{ route('web.cart_product.add') }}"
                                        method="POST">
                                        @csrf
                                        <input name="id_product" hidden readonly="true"
                                            value="{{ $productHomeSaleItem->id_product }}" type="text">
                                        <div class="ps-shoe__size"
                                            id="{{ $productHomeSaleItem->slug_product . $productHomeSaleItem_token }}">
                                            <div class="ps-shoe__size-top">
                                                <h5>Chọn kích cỡ</h5>
                                                <div data-pro_id_cart_close="{{ $productHomeSaleItem->slug_product . $productHomeSaleItem_token }}"
                                                    class="ps-shoe__size-top_close">
                                                    <i class="icofont-ui-close"></i>
                                                </div>
                                            </div>
                                            @foreach ($productAttributes as $productAttribute)
                                                <div class="ps-product__quicksize">
                                                    <ul>
                                                        @foreach ($productAttribute->hasManyAttributeVal as $attributeValue)
                                                            <li
                                                                class="input-quicksize @foreach ($productHomeSaleItem->in_many_attr as $attrval) {{ $attributeValue->attrval_id == $attrval->attrval_id ? 'block' : '' }} @endforeach">
                                                                <input name="attrval_id"
                                                                    value="{{ $attributeValue->attrval_id }}"
                                                                    id="{{ $attributeValue->attrval_id . $attributeValue->value . $productHomeSaleItem->slug_product }}"
                                                                    type="radio" class="input_quicksize">
                                                                <label class="label_quicksize"
                                                                    for="{{ $attributeValue->attrval_id . $attributeValue->value . $productHomeSaleItem->slug_product }}">
                                                                    {{ $attributeValue->value }}</label>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            @endforeach
                                            <p id="{{ $productHomeSaleItem->slug_product . $productHomeSaleItem->id_product . $productHomeSaleItem_token }}"
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
                                    @if ($productHomeSaleItem->saleoff_product)
                                        <div class="ps-badge ps-badge--sale ps-badge--2nd">
                                            <span>{{ $productHomeSaleItem->saleoff_product }} %</span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="ps-shoe__content">
                                <a class="ps-shoe__name"
                                    href="{{ route('web.product.detail', [$productHomeSaleItem->slug_product]) }}">
                                    {{ $productHomeSaleItem->name_product }}
                                </a>
                                <div class="ps-shoe__price">
                                    <h4>
                                        {{ number_format($productHomeSaleItem->pricesale_product, 0, ',', '.') }}
                                        <i class="icofont-dong"></i>
                                    </h4>
                                    @if ($productHomeSaleItem->saleoff_product)
                                        <del>
                                            {{ number_format($productHomeSaleItem->price_product, 0, ',', '.') }}
                                            <i class="icofont-dong"></i>
                                        </del>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
    <div class="ps-section--offer mt-50">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <img src="{{ asset('frontend/images/banner/home-banner-6.jpg') }}" alt="">
            </div>
        </div>
    </div>
    {{-- <div class="ps-section ps-home-blog pt-80 pb-80">
        <div class="ps-section__header mb-50">
            <h2 class="ps-section__title" data-text="News">- Our Story</h2>
            <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="#">View all post<i
                        class="fa fa-long-arrow-right"></i></a></div>
        </div>
        <div class="ps-section__content">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                        <div class="ps-post__thumbnail">
                            <a class="ps-post__overlay" href="blog-detail.html"></a><img
                                src="{{ asset('frontend/images/blog/1.jpg') }}" alt="">
                        </div>
                        <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">An
                                Inside Look at the
                                Breaking2 Kit</a>
                            <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena
                                        Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                            <p>Leverage agile frameworks to provide a robust synopsis for high level overviews.
                                Iterative approaches to corporate strategy foster collaborative thinking to
                                further…
                            </p><a class="ps-morelink" href="blog-detail.html">Read more<i
                                    class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                        <div class="ps-post__thumbnail">
                            <a class="ps-post__overlay" href="blog-detail.html"></a><img
                                src="{{ asset('frontend/images/blog/2.jpg') }}" alt="">
                        </div>
                        <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Unpacking
                                the
                                Breaking2
                                Race Strategy</a>
                            <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena
                                        Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                            <p>Leverage agile frameworks to provide a robust synopsis for high level overviews.
                                Iterative approaches to corporate strategy foster collaborative thinking to
                                further…
                            </p><a class="ps-morelink" href="blog-detail.html">Read more<i
                                    class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-post">
                        <div class="ps-post__thumbnail">
                            <a class="ps-post__overlay" href="blog-detail.html"></a><img
                                src="{{ asset('frontend/images/blog/3.jpg') }}" alt="">
                        </div>
                        <div class="ps-post__content"><a class="ps-post__title" href="blog-detail.html">Nike’s
                                Latest Football
                                Cleat Breaks the Mold</a>
                            <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Alena
                                        Studio</a></span> -<span class="ml-5">Jun 10, 2017</span></p>
                            <p>Leverage agile frameworks to provide a robust synopsis for high level overviews.
                                Iterative approaches to corporate strategy foster collaborative thinking to
                                further…
                            </p><a class="ps-morelink" href="blog-detail.html">Read more<i
                                    class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div style="background-image: url('{{ asset('frontend/images/banner/1.jpg') }}')"
        class="ps-features mt-50  mb-50 pt-50 pb-50">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="ps-iconbox">
                    <div class="ps-iconbox__header"><i class="ps-icon-delivery"></i>
                        <h3>Miễn phí vận chuyển</h3>
                        <p>ĐƠN HÀNG TRÊN 200.000 đ</p>
                    </div>
                    <div class="ps-iconbox__content">
                        <p>Bạn muốn theo dõi một gói hàng? Tìm thông tin theo dõi và chi tiết đơn hàng từ Đơn đặt hàng
                            của bạn.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="ps-iconbox">
                    <div class="ps-iconbox__header"><i class="ps-icon-money"></i>
                        <h3>Hoàn tiền 100%.</h3>
                        <p>TRONG VÒNG 30 NGÀY SAU KHI GIAO HÀNG. </p>
                    </div>
                    <div class="ps-iconbox__content">
                        <p>Bạn có thể trả lại hầu hết các mặt hàng mới, chưa mở đã bán trong vòng 30 ngày kể từ ngày
                            giao hàng để được hoàn tiền đầy đủ.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <div class="ps-iconbox">
                    <div class="ps-iconbox__header"><i class="ps-icon-customer-service"></i>
                        <h3>Hỗ trợ 24/7.</h3>
                        <p>CHÚNG TÔI CÓ THỂ GIÚP BẠN TRỰC TUYẾN.</p>
                    </div>
                    <div class="ps-iconbox__content">
                        <p>Chúng tôi cung cấp đường dây nóng dành cho khách hàng 24/7 để bạn không bao giờ đơn độc nếu
                            có thắc mắc.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
