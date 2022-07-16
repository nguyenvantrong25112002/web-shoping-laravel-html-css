<div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src=" {{ asset('frontend/plugins/bootstrap4/dist/js/bootstrap.min.js') }}"></script>
    <script src=" {{ asset('frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}">
    </script>
    <script src=" {{ asset('frontend/plugins/jquery-validate/jquery.validate.min.js') }}">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src=" {{ asset('frontend/plugins/owl_carousel/owl.carousel.min.js') }}"></script>
    <script src=" {{ asset('frontend/plugins/slick/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/aos-master/dist/aos.js') }}"></script>
    <script src="{{ asset('frontend/plugins/swiper/swiper.js') }}"></script>
    <script src="{{ asset('frontend/plugins/fontawesome-free-6.0.0-web/all.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/plugins/bootstrap-select/bootstrap-select.js') }}"></script> --}}
    <script src="{{ asset('frontend/plugins/jquery-selectric/jquery.selectric.js') }}"></script>

    {{-- lightslider --}}
    {{-- <script  src="{{ asset('frontend/css/lightslider/lightgallery-all.min.js') }}"></script> --}}
    {{-- <script  src="{{ asset('frontend/css/lightslider/lightslider.js') }}"></script> --}}
    {{-- <script  src="{{ asset('frontend/css/lightslider/prettify.js') }}"></script> --}}
    <script src="{{ asset('frontend/plugins/flipclock/flipclock.js') }}"></script>

    <script src=" {{ asset('frontend/js/main.js') }}"></script>
    <script src=" {{ asset('frontend/js/app.js') }}"></script>

</div>

@yield('javascrip.web')
<script>
    $(document).ready(function() {

        $("#tile-1 .nav-tabs a").click(function() {
            var position = $(this).parent().position();
            var width = $(this).parent().width();
            $("#tile-1 .slider").css({
                "left": +position.left,
                "width": width
            });
        });
        var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
        var actPosition = $("#tile-1 .nav-tabs .active").position();
        $("#tile-1 .slider").css({
            "left": +actPosition.left,
            "width": actWidth
        });
    });

    $(function() {
        $(document).click(function(event) {
            if (
                $('.toggle > input').is(':checked') &&
                !$(event.target).parents('.toggle').is('.toggle')
            ) {
                $('.toggle > input').prop('checked', false);
            }
        })
        $(document).ready(function() {
            $('.ps-shoe__icon .pro_id_car').click(function(e) {
                e.preventDefault();
                var slug = $(this).attr('data-pro_id_cart');
                $('.ps-shoe__size' + "#" + slug).toggleClass('active');
            });
            $('.ps-shoe__size .ps-shoe__size-top .ps-shoe__size-top_close').click(function(e) {
                e.preventDefault();
                var slug = $(this).attr('data-pro_id_cart_close');
                $('.ps-shoe__size' + "#" + slug).removeClass('active');
            });
        });



        ///cart
        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "{{ route('web.cart_product.list_cart_home') }}",
                // data: 'data',
                success: function(response) {
                    render_cart_listing(response)
                }
            });

            $(".add_to_cart").on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var id_form = form.data('id_form');
                // alert(id_form);
                var data = form.serialize();
                $.ajax({
                    method: $(form).attr('method'),
                    url: $(form).attr('action'),
                    data: data,
                    success: function(response) {
                        if (response.status === 400) {
                            $.each(response.errors, function(key, val) {
                                $(".ps-shoe__size_danger" + "#" + id_form)
                                    .text(val);
                            });
                            setTimeout(() => {
                                $(".ps-shoe__size_danger" + "#" + id_form)
                                    .empty();
                            }, 2000);
                        } else {
                            render_cart_listing(response)
                            toastr.success("Thêm giỏ hàng thành công !!");
                            $('.ps-shoe__size').removeClass('active');
                        }
                    },
                });
            });
            $('#ps-cart__listing').on('click', '.ps-remove_cart', function(e) {
                e.preventDefault();
                alert('aaaaaa');
            });

            function render_cart_listing(response) {
                $('#ps-cart__listing').empty();
                $('#ps-cart__listing').html(response);
                $('#qty_cart_show').text($('#qty_cart_hiden').val());
            }
        });


        //tìm kiếm
        $('#search-box').keyup(function(e) {
            var key_search = $(this).val();
            if (key_search != '') {
                $.ajax({
                    type: "GET",
                    url: "{{ route('web.search_ajax') }}",
                    data: {
                        key_search: key_search,
                    },
                    success: function(response) {

                        $('#search-result').empty();
                        $('#search-result').html(response);
                    }
                });
            } else {
                $('#search-result').html('');
            }
        });


    });
</script>
