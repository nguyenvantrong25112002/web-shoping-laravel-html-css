<nav class="navigation">
    <div class="container-fluid">
        {{-- <div style="display: flex;justify-content: center;align-items: center;" class="navigation__row">

            <div class="navigation__column left">
                <div style="width:50%" class="header__logo">
                    <a class="ps-logo" href="{{ route('web.home') }}">
                        <img src="{{ $logo_web }}" alt="">
                    </a>
                </div>
            </div>
            <div class="navigation__column center">
                <ul class="menu">
                    <li class="menu-item menu-item-has-children ">
                        <a href="{{ route('web.home') }}">
                            Trang chủ
                        </a>
                    </li>
                    @foreach ($cateProControllerParent as $cateParent)
                        <li class="menu-item menu-item-has-children dropdown">
                            <a
                                href="{{ route('web.product.listing', $cateParent->id_category) }}">{{ $cateParent->name_category }}</a>

                            @include('frontend.include.categoryChildrent',['cateParent' => $cateParent])
                        </li>
                    @endforeach
                    <li class="menu-item menu-item-has-children dropdown">
                        <a class="" href="#">Danh mục</a>
                        <ul class=" sub-menu">
                            @foreach ($cateProControllerParent as $cateParent)
                                <li class="menu-item menu-item-has-children dropdown">
                                    <a
                                        href="{{ route('web.product.listing', $cateParent->id_category) }}">{{ $cateParent->name_category }}</a>
                                    @include('frontend.include.categoryChildrent',['cateParent' => $cateParent])
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{{ route('web.contactus') }}">Liên hệ</a>
                    </li>
                </ul>

            </div>
            <div class="navigation__column right">

                <div class="ps-search--header ">
                    <form autocomplete="off" action="" method="post">
                        <div class="search">
                            <input type="text" id="search-box" class="search-box" />
                            <button type="button" class="search-button">
                                <i class="icofont-search-1"></i>
                            </button>
                            <div class="search-result">
                                <ul id="search-result">

                                </ul>
                                <div class="search-near">
                                    <h4>Tìm kiếm phổ biến</h4>
                                    <ul>
                                        <li><a href="">Lorem ipsum dolor sit amet.</a></li>
                                        <li><a href="">Lorem ipsum dolor sit amet.</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ps-cart">
                    <a class="ps-cart__toggle" href="{{ route('web.cart_product.cart') }}">
                        <span><i id="qty_cart_show"></i></span>
                        <i class="icofont-cart"></i>
                    </a>
                    <div class="ps-cart__listing">
                        <div id="ps-cart__listing">

                        </div>
                    </div>
                </div>
                <div class="menu-toggle">
                    <div class="menu-toggle"><span></span></div>
                    <i class="icofont-navigation-menu"></i>
                </div>
            </div>
        </div> --}}
        <div class="navigation__row">

            <div class="row">
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 ">
                    <div style="width:50%" class="header__logo ">
                        <a class="ps-logo" href="{{ route('web.home') }}">
                            <img src="{{ $logo_web }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <ul class="menu">
                        <li class="menu-item menu-item-has-children ">
                            <a href="{{ route('web.home') }}">
                                Trang chủ
                            </a>
                        </li>
                        @foreach ($cateProControllerParent as $cateParent)
                            <li class="menu-item menu-item-has-children dropdown">
                                <a
                                    href="{{ route('web.product.listing', $cateParent->id_category) }}">{{ $cateParent->name_category }}</a>

                                @include('frontend.include.categoryChildrent',['cateParent' => $cateParent])
                            </li>
                        @endforeach
                        <li class="menu-item menu-item-has-children dropdown">
                            <a class="" href="#">Danh mục</a>
                            <ul class=" sub-menu">
                                @foreach ($cateProControllerParent as $cateParent)
                                    <li class="menu-item menu-item-has-children dropdown">
                                        <a
                                            href="{{ route('web.product.listing', $cateParent->id_category) }}">{{ $cateParent->name_category }}</a>
                                        @include('frontend.include.categoryChildrent',['cateParent' => $cateParent])
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children">
                            <a href="{{ route('web.contactus') }}">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="search_cart">
                        <div class="ps-search--header ">
                            <form autocomplete="off" action="" method="post">
                                <div class="search">
                                    <input type="text" id="search-box" class="search-box" />
                                    <button type="button" class="search-button">
                                        <i class="icofont-search-1"></i>
                                    </button>
                                    <div class="search-result">
                                        <ul id="search-result">

                                        </ul>
                                        <div class="search-near">
                                            <h4>Tìm kiếm phổ biến</h4>
                                            <ul>
                                                <li><a href="">Lorem ipsum dolor sit amet.</a></li>
                                                <li><a href="">Lorem ipsum dolor sit amet.</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="ps-cart">
                            <a class="ps-cart__toggle" href="{{ route('web.cart_product.cart') }}">
                                <span><i id="qty_cart_show"></i></span>
                                <i class="icofont-cart"></i>
                            </a>
                            <div class="ps-cart__listing">
                                <div id="ps-cart__listing">

                                </div>
                            </div>
                        </div>
                        <div class="menu-toggle">
                            <div class="menu-toggle"><span></span></div>
                            <i class="icofont-navigation-menu"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</nav>
