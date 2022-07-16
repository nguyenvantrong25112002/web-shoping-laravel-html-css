@extends('frontend.layout')
@section('layout-conten')
    <main class="ps-main">
        <div class="ps-content pt-80 pb-80">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-text="My order">- Đơn hàng của bạn</h3>
                </div>
            </div>
            <div class="ps-container">
                {{-- <div class="tile" id="tile-1">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs " role="tablist">
                        <div class="slider"></div>
                       
                        @foreach ($status_bills as $status_bill)

                            <li class="nav-item">
                                <a class="nav-link {{ $status_bill->active == 0 ? 'active' : '' }} " id="profile-tab"
                                    data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                    aria-selected="{{ $status_bill->active == 0 ? 'true' : 'false' }}">
                                    {{ $status_bill->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Home
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Profile</div>

                    </div>

                </div> --}}
                <div class="ps-cart-listing">

                    @foreach ($bills as $bill)
                        <table class="table ps-cart__table table-bordered  table-active">
                            <thead>
                                <tr>
                                    <th style="width:15%">Mã đơn</th>
                                    <th style="width:10%">Tổng tiền</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width:15%"> {{ $bill->code_bill }}</td>
                                    <td style="width:10%">{{ number_format($bill->total_money, 0, ',', '.') }} VND</td>
                                    <td>
                                        <button data-id_bill="{{ $bill->code_bill }}"
                                            class="show_detail btn btn-outline-primary">Xem
                                            chi tiết</button>
                                        <button data-id_bill="{{ $bill->code_bill }}"
                                            class="show_detail btn btn-outline-dark">Đóng</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody class="hidden_detail" id="{{ $bill->code_bill }}" style="display: none">
                                <tr>
                                    <td></td>
                                    <td>Ảnh sản phẩm</td>
                                    <td style="width:20%">Tên sản phẩm</td>
                                    <td>Kích cỡ</td>
                                    <td>Giá</td>
                                    <td>Số lượng</td>
                                    <td>Tổng tiền</td>
                                    <td></td>
                                </tr>
                                @foreach ($bill->detail_bill as $detail_bill)
                                    <tr>
                                        <td></td>
                                        <td style="width:100px  ">
                                            @foreach ($products as $product)
                                                @if ($product->id_product == $detail_bill->product_id)
                                                    <img style="width:100%"
                                                        src="{{ asset("$URL_IMG_PRODUCT/$product->img_product") }}"
                                                        alt="">
                                                @endif
                                            @endforeach
                                        </td>
                                        <td style="width:20%">
                                            {{ $detail_bill->name_product }}
                                        </td>
                                        <td>
                                            {{ $detail_bill->attribute }}
                                        </td>
                                        <td>
                                            @foreach ($products as $product)
                                                @if ($product->id_product == $detail_bill->product_id)
                                                    {{ $product->pricesale_product }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $detail_bill->quantily }}
                                        </td>
                                        <td>
                                            {{ $detail_bill->price }}
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>


                        </table>
                    @endforeach

                </div>
                <div class="ps-cart-listing">


                </div>
            </div>
        </div>

    </main>
@endsection
@section('javascrip.web')
    <script>
        $(document).ready(function() {
            $('.show_detail').on('click', function(e) {
                e.preventDefault();
                var id_bill = $(this).data('id_bill');
                $('.hidden_detail' + '#' + id_bill).slideToggle(300, 'swing');
            });


        });
    </script>
@endsection
