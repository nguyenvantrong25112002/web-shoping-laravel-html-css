<div class="quixnav">


    <div class="quixnav-scroll">


        @role('admin|editer|writer|publisher', 'admin')
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        <i class="icofont-home"></i>
                        <span class="nav-text">Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icofont-ebook"></i>
                        <span class="nav-text">Quản lý đơn hàng</span>
                    </a>
                    <ul aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.order_bill.list') }}">
                                <i class="icofont-list"></i>
                                Danh sách
                            </a>
                        </li>
                        {{-- <li><a href="#">Thêm</a></li> --}}
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icofont-users-social"></i>
                        <span class="nav-text">Quản lý Admin</span>
                    </a>
                    <ul aria-expanded="false">

                        <li>
                            <a href="{{ route('admin.admin.list') }}">
                                <i class="icofont-list"></i>
                                Danh sách admin
                            </a>
                        </li>
                        @role('admin', 'admin')
                            <li><a href="{{ route('admin.roles.index') }}">Danh sách nhóm quyền</a></li>
                            <li>
                                <a href="{{ route('admin.admin.formAdd') }}">
                                    <i class="icofont-ui-add"></i>Thêm người quản trị
                                </a>
                            </li>
                        @endrole
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icofont-numbered"></i>
                        <span class="nav-text">Quản lý danh mục</span>
                    </a>
                    <ul aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.category.list') }}">
                                <i class="icofont-list"></i>
                                Danh sách
                            </a>
                        </li>
                        @hasanyrole('admin|writer', 'admin')
                            <li>
                                <a href="{{ route('admin.category.addForm') }}">
                                    <i class="icofont-ui-add"></i>Thêm
                                </a>
                            </li>
                        @endhasanyrole

                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icofont-dropbox"></i>
                        <span class="nav-text">Quản lý sản phẩm</span>
                    </a>
                    <ul aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.product.list') }}">
                                <i class="icofont-list"></i>
                                Danh sách
                            </a>
                        </li>
                        @hasanyrole('admin|writer', 'admin')
                            <li><a href="{{ route('admin.product.addForm') }}">
                                    <i class="icofont-ui-add"></i>
                                    Thêm
                                </a>
                            </li>
                        @endhasanyrole
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icofont-ui-image"></i>
                        <span class="nav-text">Quản lý banner</span>
                    </a>
                    <ul aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.banner.list') }}">
                                <i class="icofont-list"></i>
                                Danh sách
                            </a>
                        </li>
                        @hasanyrole('admin|writer', 'admin')
                            <li><a href="{{ route('admin.banner.addForm') }}">
                                    <i class="icofont-ui-add"></i>
                                    Thêm
                                </a>
                            </li>
                        @endhasanyrole
                    </ul>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icofont-brand-att"></i>
                        <span class="nav-text">Quản lý loại thuộc tính</span>
                    </a>
                    <ul aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.attribute.list') }}">
                                <i class="icofont-list"></i>
                                Danh sách loại thuộc tính
                            </a>
                        </li>
                        @hasanyrole('admin|writer', 'admin')
                            <li><a href="{{ route('admin.attribute.addForm') }}">
                                    <i class="icofont-ui-add"></i>
                                    Thêm loại thuộc tính
                                </a>
                            </li>
                            <li><a href="{{ route('admin.attribute_value.addForm') }}">
                                    <i class="icofont-ui-add"></i>
                                    Thêm giá trị thuộc tính
                                </a>
                            </li>
                        @endhasanyrole

                    </ul>
                </li>
                @hasanyrole('admin', 'admin')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class=" icofont-users"></i>
                            <span class="nav-text">Quản lý người dùng</span>
                        </a>
                        <ul aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.user.list') }}">
                                    <i class="icofont-list"></i>
                                    Danh sách người dùng
                                </a>
                            </li>
                        </ul>
                    </li>
                @endhasanyrole
            </ul>
        @endrole


    </div>




</div>
