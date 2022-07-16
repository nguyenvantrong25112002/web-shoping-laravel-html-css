<div class="header__top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                <p>Xuân Phú , Xuân Trường , Nam Định - Hotline: 804-377-3580 - 804-399-3580</p>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                <div class="header__actions">
                    @if (Auth::guard('customer')->check())
                        {{-- <div class="btn-group ps-dropdown dropdown toggle">
                            <input id="t1" type="checkbox">
                            <label for="t1">
                                <i class="icofont-user"></i>
                                {{ Auth::guard('customer')->user()->name_customer }}
                                <i class="fa fa-angle-down"></i>
                            </label>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('web.logoutCustomer.customer') }}">
                                        Đăng xuất
                                        <i class="icofont-logout"></i>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="account dropdown">
                            <div class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="icofont-user"></i>
                                {{ Auth::guard('customer')->user()->name_customer }}
                                <i class="fa fa-angle-down"></i>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('web.logoutCustomer.customer') }}">
                                    Đăng xuất
                                    <i class="icofont-logout"></i>
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('web.cart_product.list_bill') }}">
                            <i class="icofont-ebook"></i>
                            Đơn hàng
                        </a>
                    @else
                        <a href="{{ route('web.form_sign_up.customer') }}">Đăng kí</a>
                        <a href="{{ route('web.form_sign_in.customer') }}">Đăng nhập</a>
                        {{-- <a type="button" data-toggle="modal" data-target=".moda_sign_in">Đăng nhập</a>
                        <a type="button" data-toggle="modal" data-target=".moda_sign_up">Đăng kí</a> --}}
                    @endif

                    {{-- @if (Auth::guard('customer')->check())
                        <div class="btn-group ps-dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="true">
                                <i class="icofont-user"></i>
                                {{ Auth::guard('customer')->user()->name_customer }}
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('web.logoutCustomer.customer') }}">
                                        Đăng xuất
                                        <i class="icofont-logout"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('web.form.login_register') }}">Đăng nhập & Đăng kí</a>
                    @endif --}}


                    {{-- <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">USD<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><img src=" {{ asset('frontend/images/flag/usa.svg') }}" alt="">
                                    USD</a>
                            </li>
                            <li>
                                <a href="#"><img src=" {{ asset('frontend/images/flag/singapore.svg') }}" alt="">
                                    SGD</a>
                            </li>
                            <li>
                                <a href="#"><img src=" {{ asset('frontend/images/flag/japan.svg') }}" alt="">
                                    JPN</a>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Ngôn ngữ<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Tiếng việt</a></li>
                            <li><a href="#">English</a></li>
                            <li><a href="#">Japanese</a></li>
                            <li><a href="#">Chinese</a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
