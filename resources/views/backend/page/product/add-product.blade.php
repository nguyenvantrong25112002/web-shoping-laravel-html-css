@extends('backend.layout')
@section('admin-layout')

    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Thêm sản phẩm</h1>
        </div>
        <div class=" card-body">
            <div class="basic-form">

                <form id="add_product" action="{{ route('admin.product.addSave') }}" method="POST"
                    enctype="multipart/form-data">
                    {{-- <form action="" method="POST" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="row">
                        <div class="col-9">

                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input value="{{ old('name_product') }}" name="name_product" type="text" id="text_slug"
                                    class=" form-control" placeholder="Tên sản phẩm">
                                @error('name_product')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Slug sản phẩm</label>
                                <input value="{{ old('slug_product') }}" readonly="true" value="" name="slug_product"
                                    type="text" id="text_slug_result" class=" form-control">

                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <div style="padding-bottom: 10px" class="border-bottom border-primary increment xpress">
                                    <div class="input-group-append">
                                        <button style="width:25%" class="btn_imggallery_product btn btn-primary"
                                            type="button">
                                            Thêm ảnh khác
                                        </button>
                                        <input style="padding-left: 15px" type="file" name="img_gallery[]" multiple
                                            class="imggallery_product form-control-file"
                                            accept="image/gif, image/jpeg, image/png, image/webp,image/jfif">

                                    </div>
                                    @error('img_gallery')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div style="display: none;" class="remove ">
                                    <div style="margin-top: 20px;" class="xpress border-bottom border-primary">
                                        <div class="input-group-append">
                                            <button style="width:25%" class="btn_remove btn btn-danger" type="button">
                                                Xóa
                                            </button>
                                            <input style="padding-left: 15px" type="file" name="img_gallery[]" multiple
                                                class="imggallery_product form-control-file"
                                                accept="image/gif, image/jpeg, image/png, image/webp,image/jfif">
                                        </div>
                                        @error('img_gallery')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả ngắn</label>
                                <textarea class="summernote" placeholder="Mô tả ngắn" style="resize: none"
                                    class="form-control" name="description_product" id="ckeditor_product_1"
                                    rows="4">{{ old('description_product') }} </textarea>
                                @error('description_product')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết</label>
                                <textarea class="summernote" placeholder="Chi tiết" style="resize: none"
                                    class="form-control" name="details_product" class="details_product"
                                    id="ckeditor_product_2" rows="9"> {{ old('details_product') }} </textarea>
                                @error('details_product')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Trạng thái</label>

                                        <div style="display: flex;justify-content: space-around;">
                                            <label class="radio-inline">
                                                <input checked value="0" type="radio" name="status_product">Hiện</label>
                                            <label class="radio-inline">
                                                <input value="1" type="radio" name="status_product">Ẩn</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">Số lượng</label>
                                        <input value="{{ old('quantity_product') }}" type="text" name="quantity_product"
                                            id="" class="form-control" placeholder="Số lượng" aria-describedby="helpId">
                                        @error('quantity_product')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="btn  btn-primary mt-3">Thêm</button>
                                <a class="btn btn-pinterest mt-3" href="{{ route('admin.product.addForm') }}">Reset</a>
                                <a class="btn btn-google mt-3" href="{{ route('admin.product.list') }}">
                                    Quay lại
                                </a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div style="position: relative" class="form-group">
                                <style>
                                    .form-check label.error {
                                        position: absolute;
                                        bottom: 35px;
                                        left: 0;
                                    }

                                </style>
                                <label for="">Thuộc danh mục</label>
                                <div class="form-group">
                                    @foreach ($categoryParent as $cateItemParent)
                                        @php
                                            $dash = '';
                                        @endphp
                                        <hr>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="category_id[]"
                                                id="{{ $cateItemParent->id_category }}"
                                                value="{{ $cateItemParent->id_category }}">
                                            <label class="form-check-label"
                                                for="{{ $cateItemParent->id_category }}">{{ $cateItemParent->name_category }}</label>
                                        </div>
                                        @include('backend.page.product.include.Add_cateSelectChildrent',['cateItemParent'=>$cateItemParent])
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh sản phẩm</label>
                                <input value="{{ old('img_product') }}" id="files" type="file" name="img_product"
                                    accept="image/gif, image/jpeg, image/png, image/webp,image/jfif">
                                <label style="cursor: pointer" for="files">
                                    <img style="width:100%;padding-top: 15px;" id="image"
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png" />
                                </label>
                                @error('img_product')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Giá gốc sản phẩm</label>
                                <input value="{{ old('price_product') }}" type="text" name="price_product"
                                    id="price_product" class="form-control" placeholder="Giá sản phẩm"
                                    aria-describedby="helpId">
                                @error('price_product')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Giảm theo (%)</label>
                                <input value="{{ old('saleoff_product') }} " type="text" name="saleoff_product"
                                    id="saleoff_product" class="form-control" placeholder="Giảm giá theo (%)"
                                    aria-describedby="helpId">
                                @error('saleoff_product')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div style="border: 1px solid black;border-radius: 5px;">
                                <div style="padding: 20px;user-select: none;">
                                    <div class="form-group">
                                        <button onclick="tinh()" type="button" class="btn btn-facebook mt-3">
                                            Check giá khi giảm
                                        </button>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sản phẩm sẽ được giảm (so với giá gốc)</label>
                                        <input readonly="true" type="text" name="pricesale" id="pricesale"
                                            class="form-control" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá cuối cùng</label>
                                        <input readonly="true" type="text" name="pricesale_product" id="pricesale_product"
                                            class="form-control" aria-describedby="helpId">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('javascrip')
    <script>
        $(document).ready(function() {
            $("#add_product").validate({
                // onfocusout: false,
                onkeyup: false,

                // onclick: false,
                rules: {
                    img_product: {
                        required: true,
                        extension: "jpeg|png|jpg|gif",
                    },
                    name_product: {
                        required: true,
                        minlength: 10,
                        maxlength: 255,
                    },
                    price_product: {
                        required: true,
                        digits: true,
                        min: 1,
                    },
                    details_product: {
                        required: true,
                    },
                    quantity_product: {
                        required: true,
                        digits: true,
                        min: 1,
                    },
                    'category_id[]': {
                        required: true,
                    },
                    saleoff_product: {
                        digits: true,
                        number: true,
                        min: 1,
                        max: 100,
                    },
                },
                messages: {
                    saleoff_product: {
                        number: 'Phải là số !!',
                        min: 'Giảm giá mà bằng 0 ??',
                        max: 'Giảm giá mà 99 % ??',

                        digits: 'Vui lòng chỉ nhập các chữ số !',
                    },
                    img_product: {

                        required: "Chưa chọn ảnh sản phẩm !!",
                        extension: "Vui lòng chọn ảnh ở định dạng (jpeg,png,jpg,gif)."
                    },
                    name_product: {
                        required: 'Chưa nhập tên sản phẩm !!!',
                        minlength: 'Tên sản phẩm ít nhất 10 kí tự !!!',
                        maxlength: 'Tên sản phẩm tối đa 255 kí tự !!!',
                    },
                    price_product: {
                        required: 'Chưa nhập giá sản phẩm !!!',
                        digits: 'Giá sản phẩm phải là số !!',
                        min: 'Giá nhỏ hơn 0!!',
                    },
                    details_product: {
                        required: 'Chưa nhập mô tả !!!',
                    },

                    quantity_product: {
                        required: 'Chưa nhập số lượng !!!',
                        digits: 'Phải là số !!!!',
                        min: 'Số lượng 0 !!',
                    },
                    'category_id[]': {
                        required: 'Chưa chọn danh mục !!',
                    },
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn_imggallery_product').click(function() {
                var htmlData = $('.remove').html();
                $('.increment').after(htmlData);
            });
        });
        $('body').on('click', '.btn_remove', function() {
            $(this).parents('.xpress').remove();
        });
    </script>


    <script>
        document.getElementById("files").onchange = function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("image").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        };
    </script>


    <script>
        var imgs = $('.imggallery_product').val();
        var imglist = $.parseJSON(imgs)
        console.log(imglist);
    </script>
    {{-- <script>
        document.getElementsByClassName("imggallery_product").onchange = function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("image").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        };
    </script> --}}
@endsection
