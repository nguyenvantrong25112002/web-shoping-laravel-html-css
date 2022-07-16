@extends('backend.layout')
@section('admin-layout')

    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Thêm admin</h1>
        </div>
        <div class=" card-body">
            <div class="basic-form">
                <form id="add_admin" action="{{ route('admin.admin.addSave') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input value="{{ old('admin_name') }}" name="admin_name" type="text" class=" form-control"
                                    placeholder="Họ và tên">
                                @error('admin_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input value="{{ old('admin_email') }}" name="admin_email" type="text"
                                    class=" form-control" placeholder="Email">
                                @error('admin_email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Số điện thoại </label>
                                <input value="{{ old('admin_phone') }}" name="admin_phone" type="text"
                                    class=" form-control" placeholder="Số điện thoại">
                                @error('admin_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ </label>
                                <input value="{{ old('admin_address') }}" name="admin_address" type="text"
                                    class=" form-control" placeholder="Địa chỉ">
                                @error('admin_address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input value="{{ old('admin_pass') }}" name="admin_pass" type="text"
                                    class=" form-control" placeholder="Mật khẩu">
                                @error('admin_pass')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn  btn-primary mt-3">Lưu</button>
                                <a class="btn btn-pinterest mt-3" href="{{ route('admin.product.addForm') }}">Reset</a>
                                <a class="btn btn-google mt-3" href="{{ route('admin.product.list') }}">
                                    Quay lại
                                </a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <label style="cursor: pointer" for="files">
                                    <img style="width:100%;padding-top: 15px;" id="image"
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png" />
                                </label>
                                <input hidden value="{{ old('admin_img') }}" id="files" type="file" name="admin_img"
                                    accept="image/gif, image/jpeg, image/png, image/webp,image/jfif">
                                @error('admin_img')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Cấp bậc</label>

                                <div style="display: flex;justify-content: space-around;">
                                    <label class="radio-inline">
                                        <input checked value="0" type="radio" name="admin_rank">Super Admin</label>
                                    <label class="radio-inline">
                                        <input value="1" type="radio" name="admin_rank">Admin</label>
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
        document.getElementById("files").onchange = function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("image").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        };
    </script>


    <script>
        $(document).ready(function() {
            $("#add_admin").validate({
                onkeyup: false,
                rules: {
                    admin_name: {
                        required: true,
                        minlength: 1,
                    },

                    admin_email: {
                        required: true,
                        email: true
                    },
                    admin_phone: {
                        required: true,
                        number: true,
                        maxlength: 12,
                        minlength: 10,
                    },
                    admin_address: {
                        required: true,
                    },
                    admin_pass: {
                        required: true,
                    },
                    admin_img: {
                        accept: 'image/*',
                        required: true,
                    },
                },
                messages: {
                    admin_address: {
                        required: "Chưa nhập địa chỉ !!",
                    },
                    admin_pass: {
                        required: "Chưa nhập mật khẩu !!",
                    },
                    admin_img: {
                        accept: "Sai định đạng ảnh !!",
                        required: 'Chưa chọn ảnh !!',
                    },
                    admin_name: {
                        required: 'Chưa điền tên danh mục !!!',
                    },
                    admin_email: {
                        required: 'Chưa nhập email !!',
                        email: ' Vui lòng nhập một địa chỉ email hợp lệ !!'
                    },
                    admin_phone: {
                        required: "Chưa nhập số điện thoại !!",
                        number: "Sai định dạng !!",
                        minlength: "Ngắn nhât là 10 kí tự !!",
                        maxlength: "Dài nhât là 12 kí tự !!",
                    },



                }
            });
        });
    </script>

@endsection
