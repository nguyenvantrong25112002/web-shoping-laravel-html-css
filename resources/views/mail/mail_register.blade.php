{{-- <div style="text-align: center">
    <h1>
        Chào mừng {{ $name_customer }} đã đến với chúng tôi !!
    </h1>
    <h2>Mật khẩu bạn là : {{ $password_customer }}</h2>

    <div class="welcome">
        <p class=" m-5">Vui lòng click vào đây để kích hoạt tài khoản</p>
        <a id="okButton" class=" btn btn-danger"
            href="{{ route('web.customer.updateStatus', ['id_customer' => $id_customer, 'token_customer' => $token_customer]) }}">
            Kích hoạt
        </a>
    </div>
</div>

<script>
    document.getElementById("okButton")
        .addEventListener("click", function() {
            document.getElementById("welcome").hidden = true;
            // document.getElementById("awesome").hidden = false;
        }, false);
</script> --}}


<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div style="text-align: center">
                    <h1>
                        Chào mừng {{ $data['name_customer'] }} đã đến với chúng tôi !!
                    </h1>
                    <h2>Mật khẩu bạn là : {{ $data['password_customer'] }}</h2>

                    <div class="welcome">
                        <p class=" m-5">Vui lòng click vào đây để kích hoạt tài khoản</p>
                        <a id="okButton" class=" btn btn-danger"
                            href="{{ route('web.customer.updateStatus', ['id_customer' => $data['id_customer'],'token_customer' => $data['token_customer']]) }}">
                            Kích hoạt
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
