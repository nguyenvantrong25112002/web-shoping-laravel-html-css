@extends('backend.admin_layout')
@section('admin_conten')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Trang chi tiết</h1>
                <a class="btn btn-secondary mt-3" href="{{ route('admin.list.Product') }}">
                    Quay lại
                </a>
            </div>
            <div class=" card-body">
                {{-- <h3>{{ $product->name_product }}</h3> --}}
                <div class="table-responsive">
                    <table class="table table-hover table-responsive-sm">
                        {{-- <thead class="thead-primary">
                            <tr>
                                <th colspan="2"></th>
                            </tr>
                        </thead> --}}
                        <tbody>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Tổng số bình luận
                                    </h5>
                                </td>
                                <td>
                                    <div>
                                        <h2>
                                            {{ $comment }}
                                        </h2>
                                        <a href="{{ route('admin.commentProduct.Product', $product->id_product) }}"
                                            class="btn btn-facebook mt-3">
                                            Xem
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Tên sản phẩm
                                    </h5>
                                </td>
                                <td>
                                    <h4>
                                        {{ $product->name_product }}
                                    </h4>
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Ảnh sản phẩm
                                    </h5>
                                </td>
                                <td>
                                    <img style="max-width:200px" src="{{ asset('img/' . $product->img_product) }}" alt="">
                                </td>

                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Thuộc danh mục sản phẩm
                                    </h5>
                                </td>
                                <td>
                                    @foreach ($category as $cate)
                                        <?php
                                        if ($cate['id_category'] == $product['category_id']) {
                                            echo $cate['name_category'];
                                        }
                                        ?>
                                    @endforeach
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Giá gốc sản phẩm chưa áp dụng (%) sale off
                                    </h5>
                                </td>
                                <td>
                                    <h4>
                                        {{ number_format($product->price_product) }}(VND)
                                    </h4>
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        - (%) sale off
                                    </h5>
                                </td>
                                <td>
                                    {{ $product->saleoff_product }} (%)
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Giá áp dụng (%) sale off
                                    </h5>
                                </td>
                                <td>
                                    <h4>
                                        {{ number_format($product->price_product) }}(VND)
                                    </h4>
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Sản phẩm còn trong kho
                                    </h5>
                                </td>
                                <td>
                                    {{ $product->quantity_product }}
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Trạng thái
                                    </h5>
                                </td>
                                <td>
                                    @if ($product->status_product == 0)
                                        Hiện
                                    @else
                                        Ẩn
                                    @endif
                                </td>
                            </tr>

                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Ngày sửa
                                    </h5>
                                </td>
                                <td>
                                    {{ $product->updated_at }}
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Ngày thêm
                                    </h5>
                                </td>
                                <td>
                                    {{ $product->created_at }}
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Mô tả
                                    </h5>
                                </td>
                                <td>
                                    {!! $product->description_product !!}
                                </td>
                            </tr>
                            <tr colspan="2">
                                <td style="width: 20%">
                                    <h5>
                                        Chi tiết
                                    </h5>
                                </td>
                                <td>
                                    {!! $product->details_product !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
