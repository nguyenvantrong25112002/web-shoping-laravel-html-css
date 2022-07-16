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
                                <div class="form-group select-box">
                                    <label for="">Kích thước</label>
                                    <select data-id_cart="{{ $carts_pro->rowId }}" name="size_update"
                                        class="select">
                                        @foreach ($productAttributes as $valueAttrs)
                                            @foreach ($valueAttrs->hasManyAttributeVal as $valueAttr)
                                                <option
                                                    {{ $valueAttr->attrval_id == $carts_pro->options->size ? 'selected' : '' }}
                                                    value="{{ $valueAttr->attrval_id }}">
                                                    {{ $valueAttr->value }}</option>
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
                                    <input id="{{ $carts_pro->rowId }}" class="qtyValue form-control" type="text"
                                        value="{{ $carts_pro->qty }}">
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
            <h1 style="text-align: center">Chưa có sản phẩm nào trong giỏ hàng !!</h1>
        @endif
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 ">
        <div class="ps-cart__actions ">
            <div class="ps-cart__promotion mb-5">
                <form action="#" method="post">
                    <div class="form-group">
                        <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                            <input class="form-control" type="text" placeholder="Promo Code">
                        </div>
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
            <a class="ps-btn" href="{{ route('web.cart_product.checkout_cart') }}">Thanh toán<i
                    class="ps-icon-next"></i></a>
            <div class="ps-shipping mt-20">
                <h3>Miễn phí vận chuyển</h3>
                <p>
                    Đơn hàng của bạn được miễn phí vận chuyển
                </p>
            </div>
        </div>
    </div>
</div>
