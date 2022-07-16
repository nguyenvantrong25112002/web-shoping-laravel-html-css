<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href=" {{ asset('frontend/images/logo/icon.jpg') }}" rel="icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NVT Shop</title>
    @include('frontend.include.link_css')
</head>

<body class="ps-loading ">
    {{-- <div class="header--sidebar"></div> --}}
    @include('frontend.include.sidebar_item')
    <header class="header">
        @include('frontend.include.header__top')
        @include('frontend.include.navigation')
    </header>
    <div class="container-fluid ">
        <main class="ps-main">
            @yield('layout-conten')
        </main>
    </div>
    @include('frontend.include.ps-subscribe')
    @include('frontend.include.ps-footer')
    @include('frontend.include.link_js')
</body>

</html>
