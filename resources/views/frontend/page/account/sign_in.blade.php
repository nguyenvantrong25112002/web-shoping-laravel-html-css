@extends('frontend.layout')
@section('layout-conten')
    <main class="sign_in main-content  mt-5 mb-5">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center  mb-0">Đăng nhập</h4>
                                    <div class="row mt-3">
                                        <div class="col-3 text-center ms-auto">
                                            <a class="link_sign_up " href="javascript:;">
                                                <i class="fa-brands fa-facebook"></i>
                                            </a>
                                        </div>

                                        <div class="col-3 text-center me-auto">
                                            <a class="link_sign_up " href="{{ route('web.customer.login_google') }}">
                                                <i class="fa-brands fa-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="myForm" action="{{ route('web.loginCustomer.customer') }}" method="POST"
                                    class="text-start">
                                    @csrf
                                    <div class="form ">
                                        <input class="form-input" type="text" name="email_customer" autocomplete="off"
                                            placeholder=" " />
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


                                    <div class="form-check form-switch d-flex align-items-center ">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label mb-0 ms-2" for="rememberMe">Nhớ mật khẩu</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                                            Đăng nhập
                                        </button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Bạn chưa có tài khoản ?
                                        <a href="{{ route('web.form_sign_up.customer') }}"
                                            class="text-primary text-gradient font-weight-bold">Đăng kí</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
@section('javascrip.web')
    <script>
        $('#myForm').on('submit', function(e) {

            e.preventDefault();
            let form = this;

            let data = $(this).serialize();
            $.ajax({
                method: $(form).attr('method'),
                url: $(form).attr('action'),
                data: data,
                dataType: "json",
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },
                success: function(response) {
                    if (response.code == 0) {
                        $.each(response.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else if (response.code == 1) {
                        toastr.error(response.error);
                        if (response.warning) {

                            setTimeout(() => {
                                toastr.warning(response.warning);
                            }, 500);
                        }
                    } else {
                        $(form)[0].reset();
                        toastr.success(response.msg);
                        setTimeout(() => {
                            window.location.href = response.url
                        }, 500);

                    }
                },
                error: function(er) {
                    // toastr.error(er.error);
                    toastr.error(er.responseJSON.error);
                }
            });
        });
    </script>
@endsection
