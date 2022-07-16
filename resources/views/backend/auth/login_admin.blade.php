<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Admin </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{ asset('backend/css/style.css') }} " rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <form class="form-valide-with-icon" action="{{ route('admin.auth.loginCheck') }}"
                                        method="post">
                                        @csrf
                                        <?php 
                                        $mes = Session::get('mes');
                                        if ($mes) :?>
                                        <div class="alert alert-info" role="alert">
                                            <strong> <?= $mes ?></strong>
                                            <?php Session::put('mes', null); ?>
                                        </div>
                                        <?php endif?>
                                        <div class="card-header">
                                            <h2>Đăng nhập trang chủ Admin</h2>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="" name="admin_email"
                                                    placeholder="Enter email...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Mật khẩu</label>
                                            <div class="input-group transparent-append">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" name="admin_pass"
                                                    placeholder="Enter password...">
                                                {{-- <div class="input-group-append show-pass">
                                                    <span class="input-group-text"> <i class="fa fa-eye-slash"></i>
                                                    </span> 
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">
                                                        Nhớ mật khẩu
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Quên mật khẩu</a>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="form-check">
                                                <input id="checkbox1" class="form-check-input" type="checkbox">
                                                <label for="checkbox1" class="form-check-label">Check me
                                                    out</label>
                                            </div>
                                        </div> --}}
                                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                        <div class="new-account mt-3">
                                            <p>Không có tài khoản??
                                                <a class="text-primary" href="{{ route('admin.auth.register') }}">
                                                    Đăng kí
                                                </a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('backend/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backend/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        jQuery(".form-valide-with-icon").validate({
            rules: {
                "admin_email": {
                    required: !0,
                    minlength: 3
                },
                "admin_pass": {
                    required: !0,
                    minlength: 5
                }
            },
            messages: {
                "admin_email": {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 3 characters"
                },
                "admin_pass": {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                }
            },

            ignore: [],
            errorClass: "invalid-feedback animated fadeInUp",
            errorElement: "div",
            errorPlacement: function(e, a) {
                jQuery(a).parents(".form-group > div").append(e)
            },
            highlight: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid")
            },
            success: function(e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-valid")
            }




        });
    </script>
</body>

</html>
