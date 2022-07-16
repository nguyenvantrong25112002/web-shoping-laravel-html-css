@extends('backend.layout')
@section('admin-layout')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Thêm loại thuộc tính</h2>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.attribute.addSave') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Tên loại thuộc tính</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Thứ tự thuộc tính (lớn đến bé)</label>
                                        <input name="order" type="number" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-rounded btn-primary">Lưu</button>
                                    <button style="margin-left: 10px" type="reset"
                                        class="btn btn-rounded btn-outline-secondary">Reset</button>
                                    <a href="#" style="margin-left: 10px" type="submit"
                                        class="btn btn-rounded btn-outline-dark">Quay lại</a>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Định dạng thuộc tính</label>
                                        <select name="type" class="form-control">
                                            <option value="text" class="form-control-lg">Chữ</option>
                                            <option value="number" class="form-control-lg">Số</option>
                                            <option value="color" class="form-control-lg">Màu sắc</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select name="status" class="form-control">
                                            <option value="0" class="form-control-lg">Hiện navbav danh mục</option>
                                            <option value="1" class="form-control-lg">Hiện sản phẩm chi tiết</option>
                                            <option value="2" class="form-control-lg">Ẩn</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascrip')
    <script>
        // $(document).ready(function() {
        //     $("#add_category").validate({
        //         onkeyup: false,
        //         rules: {
        //             name_category: {
        //                 required: true,
        //                 minlength: 1,
        //             },
        //             order_category: {
        //                 number: true,
        //             },

        //         },
        //         messages: {
        //             name_category: {
        //                 required: 'Bạn chưa điền tên danh mục !!!',
        //             },
        //             order_category: {
        //                 number: 'Phải là số !!!',
        //             },

        //         }
        //     });
        // });
    </script>
@endsection
