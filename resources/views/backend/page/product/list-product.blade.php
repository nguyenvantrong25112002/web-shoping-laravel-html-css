@extends('backend.layout')
@section('page-title-admin', 'Danh sách sản phẩm')
@section('admin-layout')

    <div class="row">
        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">
                    <div id="accordion-filter" class="accordion accordion-header-bg accordion-bordered">

                        <div class="accordion__item">
                            <div style="user-select: none" class="accordion__header collapsed accordion__header--primary "
                                data-toggle="collapse" data-target="#header-bg_collapsefilter">
                                <span class="accordion__header--icon"></span>
                                <span class="accordion__header--text  ">Lọc</span>
                                <span class="accordion__header--indicator"></span>
                            </div>
                            <div id="header-bg_collapsefilter" class="collapse accordion__body"
                                data-parent="#accordion-filter">
                                <div class="accordion__body--text">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Danh mục</label>
                                                <select class="selectpicker" id="filter-category">
                                                    <option>Chọn danh mục</option>
                                                    @foreach ($categoryParent as $cateItemParent)
                                                        @php
                                                            $dash = '';
                                                        @endphp
                                                        <option value="{{ $cateItemParent->id_category }}">

                                                            {{ $cateItemParent->name_category }}
                                                        </option>
                                                        @include(
                                                            'backend.page.category.include.Add_cateSelectChildrent',
                                                            [
                                                                'cateItemParent' => $cateItemParent,
                                                            ]
                                                        )
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Giá</label>
                                                <select class="selectpicker">
                                                    <option>Chọn khoảng giá</option>
                                                    <option>Dưới 100.000</option>
                                                    <option>Từ 100.000 đến 500.000</option>
                                                    <option>Từ 500.000 đến 1.000.000</option>
                                                    <option>Từ 100.000 đến 1.000.000</option>
                                                    <option>Trên 1.000.000</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Tìm kiếm</label>
                                                <input type="text" name="" id="" class="form-control"
                                                    placeholder="Nhập tên sản phẩm ..." aria-describedby="helpId">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-2 d-flex justify-content-start align-items-end">
            <div class="form-group">
                <label for="">Hiển thị</label>
                <select id="limit-page" class="selectpicker">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>

        </div>
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">

                <?php 
                $mes = Session::get('mes');
               
                if ($mes) :?>
                <div class="alert alert-info" role="alert">
                    <strong> <?= $mes ?></strong>
                    <?php Session::put('mes', null); ?>
                </div>
                <?php endif?>



                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-responsive-sm">
                            <thead class="thead-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th style="width:15%" scope="col">Tên sản phẩm</th>
                                    <th style="width:130px" scope="col">Ảnh sản phẩm</th>
                                    <th scope="col">Thuộc danh mục</th>
                                    <th scope="col">Giá gốc (VND)</th>
                                    <th scope="col">Giá sale off (VND)</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Ngày thêm</th>
                                    <th scope="col">Ngày sửa</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $pro)
                                    <tr>
                                        <td>
                                            {{ (request()->has('page') && request('page') !== 1 ? $products->perPage() * (request('page') - 1) : 0) +$key +1 }}
                                        </td>
                                        <td>
                                            {{ $pro->name_product }}
                                        </td>
                                        <td>
                                            <img style="max-width:100%"
                                                src="{{ asset("$URL_IMG_PRODUCT/$pro->img_product") }}" alt="">
                                        </td>
                                        <th>
                                            @foreach ($pro->in_many_categorys as $cate)
                                                <span>{{ $cate->name_category }}</span><br>
                                            @endforeach
                                        </th>


                                        <td style=" text-decoration: line-through;">
                                            {{ number_format($pro->price_product, 0, ',', '.') }}đ
                                        </td>
                                        <td>
                                            {{ number_format($pro->pricesale_product, 0, ',', '.') }}đ
                                        </td>
                                        <td>
                                            @if ($pro->status_product == 0)
                                                <button data-text_namePro="{{ $pro->name_product }}"
                                                    data-status="{{ $pro->status_product }}"
                                                    data-id_pro="{{ $pro->id_product }}" type="button"
                                                    class="status_product btn btn-rounded btn-primary">
                                                    <i class="icofont-eye"></i>
                                                    Hiện
                                                </button>
                                            @else
                                                <button data-text_namePro="{{ $pro->name_product }}"
                                                    data-status="{{ $pro->status_product }}"
                                                    data-id_pro="{{ $pro->id_product }}" type="button"
                                                    class="status_product btn btn-rounded btn-outline-danger">
                                                    <i class="icofont-eye-blocked"></i>
                                                    Ẩn
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            {{ date('d-m-Y H:i', strtotime($pro->created_at)) }}
                                            <br>
                                            {{ $pro->created_at->diffforHumans() }}
                                        </td>
                                        <td>
                                            {{ date('d-m-Y H:i', strtotime($pro->updated_at)) }}
                                            <br>
                                            {{ $pro->updated_at->diffforHumans() }}
                                        </td>
                                        <td style="text-align: center;display: grid;align-content: space-evenly;">
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="icofont-listine-dots"></i>
                                                </button>
                                                <div class="dropdown-menu ">
                                                    <a href="{{ route('admin.product.editForm', $pro->id_product) }}"
                                                        class="btn btn-rounded btn-primary mb-2 ml-2">
                                                        <i class="icofont-ui-edit"></i>
                                                        Sửa
                                                    </a>

                                                    <button type="button"
                                                        data-img_pro="{{ asset("$URL_IMG_PRODUCT/$pro->img_product") }}"
                                                        data-text_namePro="{{ $pro->name_product }}"
                                                        data-id_pro="{{ $pro->id_product }}"
                                                        class="deleteProduct btn btn-rounded btn-danger  mb-2">
                                                        Xóa
                                                        <i class="icofont-bin"></i>
                                                    </button>


                                                    <button type="button" class="add_attr btn btn-primary ml-2"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        data-id_pro="{{ $pro->id_product }}"
                                                        data-text_namePro="{{ $pro->name_product }}">
                                                        <i class="icofont-options"></i>
                                                        Thuộc tính
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- diffforHumans --}}
                                @endforeach
                            </tbody>
                            <tfoot class="thead-primary">
                                <th scope="col">#</th>
                                <th style="width:15%" scope="col">Tên sản phẩm</th>
                                <th style="width:130px" scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Thuộc danh mục</th>
                                <th scope="col">Giá gốc (VND)</th>
                                <th scope="col">Giá sale off (VND)</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Ngày thêm</th>
                                <th scope="col">Ngày sửa</th>
                                <th>Thao tác</th>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-end align-items-end">
            {{-- {!! $product->links() !!} --}}
            {{ $products->appends(request()->all())->links('pagination::bootstrap-4') }}
        </div>
    </div>



    <div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div id="modal-content" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Thêm hoặc sửa thuộc tính </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="modal_body" class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascrip')
    <script src="{{ asset('backend/assets/js/system/pagination/pagination.js') }}"></script>
    <script>
        var URL_MAIN = '/admin/product?';
        var URL_PRODUCT_ATTR_EDIT = '{{ route('admin.product.edit_productAttributes') }}'
        var URL_PRODUCT_STATUS = '{{ route('admin.product.updateStatusAjax') }}'
        var URL_PRODUCT_DELETE = '{{ route('admin.product.delete') }}'
        paginate.limit('#limit-page', URL_MAIN);
    </script>
    <script src="{{ asset('backend/assets/js/system/product/list-product.js') }}"></script>
@endsection
