@extends('frontend.layout')
@section('layout-conten')
    <main class="main-content mt-5 mb-5">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('{{ asset('frontend/images/banner/pic1.jpeg') }}'); background-size: cover;background-repeat: no-repeat;background-position: bottom;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Đăng kí tài khoản</h4>
                                    <p class="mb-0">Nhập email và mật khẩu của bạn để đăng ký</p>
                                </div>
                                <div class="card-body">
                                    <form id="myForm" action="{{ route('web.saveadd.customer') }}" method="POST">
                                        @csrf

                                        <div class="form ">
                                            <input class="form-input" type="text" name="name_customer"
                                                autocomplete="off" placeholder=" " />
                                            <label for="name_customer" class="label-name">
                                                Name
                                            </label>
                                            <span class=" text-danger error-text name_customer_error"></span>
                                        </div>
                                        <div class="form ">
                                            <input class="form-input" type="text" name="email_customer"
                                                autocomplete="off" placeholder=" " />
                                            <label for="email_customer" class="label-name">
                                                Email
                                            </label>
                                            <span class=" text-danger error-text email_customer_error"></span>
                                        </div>
                                        <div class="form ">
                                            <input class="form-input" type="text" name="password_customer"
                                                autocomplete="off" placeholder=" " />
                                            <label for="password_customer" class="label-name">
                                                Password
                                            </label>
                                            <span class=" text-danger error-text password_customer_error"></span>
                                        </div>
                                        {{-- <div class=" form-group mb-3">
                                            <div class="input-group input-group-outline mb-1">
                                                <label class="form-label">Name</label>
                                                <input name="name_customer" type="text" class="form-control">
                                            </div>
                                            <span class=" text-danger error-text name_customer_error"></span>
                                        </div>
                                        <div class=" form-group mb-3">
                                            <div class="input-group input-group-outline mb-1">
                                                <label class="form-label">Email</label>
                                                <input name="email_customer" type="email" class="form-control">
                                            </div>
                                            <span class=" text-danger error-text email_customer_error"></span>

                                        </div>
                                        <div class=" form-group mb-3">
                                            <div class="input-group input-group-outline mb-1">
                                                <label class="form-label">Password</label>
                                                <input name="password_customer" type="password" class="form-control">
                                            </div>
                                            <span class=" text-danger error-text password_customer_error"></span>

                                        </div> --}}
                                        <div class="form-check form-check-info text-start ps-0">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                                checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Tôi đồng ý với <a href="javascript:;"
                                                    class="text-dark font-weight-bolder">Các điều khoản và điều kiện</a>
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
                                                Đăng Kí
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Bạn đã có tài khoản ?
                                        <a href="{{ route('web.form_sign_in.customer') }}"
                                            class="text-primary text-gradient font-weight-bold">Đăng nhập</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('javascrip.web')
    <script>
        $(document).ready(function() {
            $('#myForm').submit(function(e) {
                e.preventDefault();
                let form = this;
                let data = $(this).serialize();
                $.ajax({
                    method: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: data,
                    beforeSend: function() {
                        $(form).find('span.error-text').text('');
                    },
                    success: function(response) {
                        if (response.code == 0) {
                            $.each(response.error, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                        } else {
                            $(form)[0].reset();
                            toastr.success(response.success);
                            setTimeout(() => {
                                toastr.warning(
                                    'Vui lòng check email để xác minh đăng nhập !!');
                            }, 1000);
                        }
                    }
                });
            });
        });
    </script>
@endsection
