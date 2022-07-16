@extends('frontend.layout')
@section('layout-conten')
    <div class="pt-80 pb-80">
        <div class="row">
            <div class="col-lg-2 ">
                <form action="#" method="get">
                    <div class="ps-sidebar">
                        <aside class="ps-widget--sidebar ps-widget--category">
                            <div class="ps-widget__header">
                                <h3>{{ $productCate->name_category }}</h3>
                            </div>
                            <div class="ps-widget__content">
                                <ul class="ps-list--checked">
                                    @foreach ($productCate->categoryChildrent as $cate)
                                        <li>
                                            <input name="filters_category" data-filters_category="category"
                                                value="{{ $cate->id_category }}" id="{{ $cate->id_category }}"
                                                type="radio" class="ip_checkbox">
                                            <label for="{{ $cate->id_category }}">{{ $cate->name_category }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                        <div class="ps-sticky desktop">
                            @foreach ($attributes as $attribute)
                                <aside class="ps-widget--sidebar">
                                    <div class="ps-widget__header">
                                        <h3>{{ $attribute->name }}</h3>
                                    </div>
                                    <div class="ps-widget__content">
                                        <ul class="ps-list--checked none">
                                            @foreach ($attribute->hasManyAttributeVal as $attributeval)
                                                <li>
                                                    <input
                                                        {{ strcmp($attribute->type, 'color') == 0 ? 'style=display:none' : '' }}
                                                        name="filters_category" data-filters_category="category"
                                                        value="{{ $attributeval->value }}"
                                                        id="{{ $attributeval->attrval_id }}" type="checkbox"
                                                        class="ip_checkbox  {{ strcmp($attribute->type, 'color') == 0 ? 'productAttribute-color' : '' }}">
                                                    @if (strcmp($attribute->type, 'color') == 0)
                                                        <label class="productAttribute_color"
                                                            for="{{ $attributeval->attrval_id }}">
                                                            <span
                                                                style="background-color: {{ $attributeval->value }} "></span>
                                                        </label>
                                                    @else
                                                        <label for="{{ $attributeval->attrval_id }}">
                                                            {{ $attributeval->value }}
                                                        </label>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </aside>
                            @endforeach

                        </div>

                    </div>
                </form>
            </div>
            <div class="col-lg-10">
                <div class="ps-products">
                    <div class="row">
                        @php
                            $productCateItem_token = '_' . uniqid(5) . Str::random(5);
                        @endphp
                        @foreach ($productCate->in_many_products as $productCateItem)
                            <div class="col-lg-3 col-xs-12 col-md-12 col-sm-6 ">
                                <div class=" grid-item__content-wrapper">
                                    <div class="ps-shoe mb-30">
                                        <div class="ps-shoe__top">
                                            <div class="ps-shoe__top-left">
                                                <a
                                                    href=" {{ route('web.product.detail', [$productCateItem->slug_product]) }}">
                                                    <div style="height:330px; background-image: url('{{ asset("$URL_IMG_PRODUCT/$productCateItem->img_product") }}');"
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
                                                        data-pro_id_cart="{{ $productCateItem->slug_product . $productCateItem_token }}">
                                                        <i class="icofont-brand-aliexpress"></i>
                                                    </li>
                                                </ul>
                                                <a class="ps-buy_now" href="#">
                                                    Mua ngay
                                                </a>

                                                <form
                                                    data-id_form="{{ $productCateItem->slug_product . $productCateItem->id_product . $productCateItem_token }}"
                                                    class="add_to_cart" action="{{ route('web.cart_product.add') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input name="id_product" hidden readonly="true"
                                                        value="{{ $productCateItem->id_product }}" type="text">
                                                    <div class="ps-shoe__size"
                                                        id="{{ $productCateItem->slug_product . $productCateItem_token }}">
                                                        <div class="ps-shoe__size-top">
                                                            <h5>Chọn kích cỡ</h5>
                                                            <div data-pro_id_cart_close="{{ $productCateItem->slug_product . $productCateItem_token }}"
                                                                class="ps-shoe__size-top_close">
                                                                <i class="icofont-ui-close"></i>
                                                            </div>
                                                        </div>
                                                        @foreach ($productAttributes as $productAttribute)
                                                            <div class="ps-product__quicksize">
                                                                <ul>
                                                                    @foreach ($productAttribute->hasManyAttributeVal as $attributeValue)
                                                                        <li
                                                                            class="input-quicksize @foreach ($productCateItem->in_many_attr as $attrval) {{ $attributeValue->attrval_id == $attrval->attrval_id ? 'block' : '' }} @endforeach">
                                                                            <input name="attrval_id"
                                                                                value="{{ $attributeValue->attrval_id }}"
                                                                                id="{{ $attributeValue->attrval_id . $attributeValue->value . $productCateItem->slug_product }}"
                                                                                type="radio" class="input_quicksize">
                                                                            <label class="label_quicksize"
                                                                                for="{{ $attributeValue->attrval_id . $attributeValue->value . $productCateItem->slug_product }}">
                                                                                {{ $attributeValue->value }}</label>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                        <p id="{{ $productCateItem->slug_product . $productCateItem->id_product . $productCateItem_token }}"
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
                                                @if ($productCateItem->saleoff_product)
                                                    <div class="ps-badge ps-badge--sale ps-badge--2nd">
                                                        <span>{{ $productCateItem->saleoff_product }}%</span>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="ps-shoe__content">

                                            <a class="ps-shoe__name"
                                                href="{{ route('web.product.detail', [$productCateItem->slug_product]) }}">
                                                {{ $productCateItem->name_product }}
                                            </a>

                                            <div class="ps-shoe__price">
                                                <h4>
                                                    {{ number_format($productCateItem->pricesale_product, 0, ',', '.') }}
                                                    <i class="icofont-dong"></i>
                                                </h4>
                                                @if ($productCateItem->saleoff_product)
                                                    <del>{{ number_format($productCateItem->price_product, 0, ',', '.') }}
                                                        <i class="icofont-dong"></i>
                                                    </del>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="ps-product-action mt-5">
                        <div class="ps-product__filter">
                            <select name="" class="select">
                                <option value="1">Shortby</option>
                                <option value="2">Name</option>
                                <option value="3">Price (Low to High)</option>
                                <option value="3">Price (High to Low)</option>
                            </select>
                        </div>
                        <div class="ps-pagination">
                            <ul class="pagination">
                                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
