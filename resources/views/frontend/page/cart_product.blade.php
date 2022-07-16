@extends('frontend.layout')
@section('layout-conten')
    {{-- <form action=" {{ route('web.cart_product.checkout_cart') }}" method="post">
        @csrf
        @foreach ($carts_pros as $carts_pro)
            <div class="form-check">
                <label class="form-check-label" for="{{ $carts_pro->rowId }}">
                    <input type="checkbox" class="form-check-input" name="row_id[]" id="{{ $carts_pro->rowId }}"
                        value="{{ $carts_pro->rowId }}">
                    {{ $carts_pro->rowId }}
                </label>
            </div>
        @endforeach
        <button type="submit">click</button>
    </form> --}}
    <div class="ps-content pt-80 pb-80">
        <div class="ps-cart-listing" id="ps-cart-listing_page">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 ">
                    @if (Cart::count() > 0)
                        {{-- ps-cart__table --}}
                        <table class="table table-borderlessstriped table-inverse table-responsive">
                            <thead>
                                <tr>
                                    <th style="width:150px">Sản phẩm</th>
                                    <th style="width:20%">Kích thước</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng giá</th>
                                    <th>
                                        <div title="Xóa tất cả" class="ps-remove ps-remove_cart_all">
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts_pros as $carts_pro)
                                    <tr>
                                        <td>
                                            @php
                                                $img = $carts_pro->options;
                                            @endphp
                                            <a class="ps-product__preview" href="product-detail.html">
                                                <div>
                                                    <img style="width:50%" class="mr-15"
                                                        src="{{ asset("$URL_IMG_PRODUCT/$img->image") }}" alt="">
                                                    <p>
                                                        {{ $carts_pro->name }}
                                                    </p>
                                                </div>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="form-group select-box ">
                                                <label for="">Kích thước</label>
                                                <select data-id_cart="{{ $carts_pro->rowId }}" name="size_update"
                                                    class="select">
                                                    @foreach ($productAttributes as $valueAttrs)
                                                        @foreach ($valueAttrs->hasManyAttributeVal as $valueAttr)
                                                            <option
                                                                {{ $valueAttr->attrval_id == $carts_pro->options->size ? 'selected' : '' }}
                                                                value="{{ $valueAttr->attrval_id }}">
                                                                {{ $valueAttr->value }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>
                                                {{ number_format($carts_pro->price, 0, ',', '.') }} VND
                                            </h5>
                                        </td>
                                        <td>
                                            <div class="form-group--number qtySelector">
                                                <button data-id_num="{{ $carts_pro->rowId }}"
                                                    class="decreaseQty minus"><span>-</span></button>
                                                <input id="{{ $carts_pro->rowId }}" class="qtyValue form-control"
                                                    type="text" value="{{ $carts_pro->qty }}">
                                                <button data-id_num="{{ $carts_pro->rowId }}"
                                                    class="increaseQty plus"><span>+</span></button>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>
                                                {{ number_format($carts_pro->price * $carts_pro->qty, 0, ',', '.') }} VND
                                            </h5>
                                        </td>
                                        <td>
                                            <div data-id_cart="{{ $carts_pro->rowId }}" class="ps-remove ps-remove_cart">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <table class="table table-borderlessstriped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                    <th style="width:150px">Sản phẩm</th>
                                    <th style="width:20%">Kích thước</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng giá</th>
                                    <th>
                                        <div title="Xóa tất cả" class="ps-remove ps-remove_cart_all">
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                           
                        </table> --}}
                    @else
                        {{-- display: block;
    text-align: center; --}}
                        <div class=" text-center">
                            <img style="max-width: 200px" src="{{ asset('frontend/images/bags.png') }}" alt="">
                            <h1>Chưa có sản phẩm nào trong giỏ hàng !!</h1>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="ps-cart__actions ">
                        <div class="ps-cart__promotion mb-5">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Promo Code">
                                </div>
                                <div class="form-group mt-4">
                                    <button type="button" class="ps-btn ">Gắn mã giảm giá</button>
                                </div>
                            </form>
                        </div>
                        <div class="ps-cart__total">

                            <p>Tổng tiền chưa thuế :</p>
                            <span>{{ Cart::subtotal(0, '', '.') }} VND</span>
                        </div>
                        <div class="ps-cart__total">
                            <p>Thuế :</p>
                            <span>{{ Cart::tax(0, '', '.') }} VND</span>
                        </div>
                        <div class="ps-cart__total">
                            <p>
                                Tổng tiền :
                            </p>
                            <span> {{ Cart::total(0, '', '.') }} VND</span>
                        </div>
                        <a class="ps-btn" href="{{ route('web.cart_product.checkout_cart') }}">
                            Thanh toán
                            <i class="ps-icon-next"></i>
                        </a>
                        <div class="ps-shipping mt-20">
                            <h3>Miễn phí vận chuyển</h3>
                            <p>
                                Đơn hàng của bạn được miễn phí vận chuyển
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascrip.web')
    <script>
        $(document).ready(function() {
            var minVal = 1,
                maxVal = 5;
            $(document).on('click', ".increaseQty", function() {
                var $parentElm = $(this).parents(".qtySelector");
                var rowId = $(this).data('id_num');
                $(this).addClass("clicked");
                setTimeout(function() {
                    $(".clicked").removeClass("clicked");
                }, 100);
                var value = $parentElm.find(".qtyValue").val();
                if (value < maxVal) {
                    value++;
                    ajax_UpdateQty(rowId, value);

                }
                $parentElm.find(".qtyValue").val(value);
            });
            $(document).on('click', ".decreaseQty", function() {
                var $parentElm = $(this).parents(".qtySelector");
                var rowId = $(this).data('id_num');
                $(this).addClass("clicked");
                setTimeout(function() {
                    $(".clicked").removeClass("clicked");
                }, 100);
                var value = $parentElm.find(".qtyValue").val();
                if (value > 1) {
                    value--;
                    ajax_UpdateQty(rowId, value);
                }
                $parentElm.find(".qtyValue").val(value);
            });

            function ajax_UpdateQty(rowId, value) {
                $.ajax({
                    type: "post",
                    url: "{{ route('web.cart_product.update_cart') }}",
                    data: {
                        rowId: rowId,
                        value: value,
                    },
                    success: function(response) {
                        render_cart_listing_page(response)
                        toastr.success("Cập nhập giỏ hàng thành công !!");
                    }
                });
            }
            $('#ps-cart-listing_page').on('click', '.ps-remove.ps-remove_cart', function(e) {
                e.preventDefault();
                var rowId = $(this).data('id_cart');
                $.ajax({
                    type: "post",
                    url: "{{ route('web.cart_product.remove_cart') }}",
                    data: {
                        rowId: rowId,
                    },
                    success: function(response) {
                        render_cart_listing_page(response)
                        toastr.success("Xóa giỏ hàng thành công !!");
                    }
                });
            });
            $('#ps-cart-listing_page').on('click', '.ps-remove_cart_all', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "get",
                    url: "{{ route('web.cart_product.remove_cart_all') }}",
                    success: function(response) {
                        render_cart_listing_page(response)
                        toastr.success("Xóa giỏ hàng thành công !!");
                    }
                });
            });

            $('#ps-cart-listing_page').on('change', '.select-box .select', function(e) {
                e.preventDefault();
                var id_attr = $(this).val();
                var rowId = $(this).data('id_cart');
                $.ajax({
                    type: "post",
                    url: "{{ route('web.cart_product.update_cart_size') }}",
                    data: {
                        rowId: rowId,
                        id_attr: id_attr,
                    },
                    success: function(response) {
                        render_cart_listing_page(response)
                        toastr.success("Cập nhập size giỏ hàng thành công !!");
                    }
                });
            });

            function render_cart_listing_page(response) {
                $('#ps-cart-listing_page').empty();
                $('#ps-cart-listing_page').html(response);
                $('.select').selectric('refresh');
            }
        });
    </script>
@endsection
