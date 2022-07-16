<div>
    <script src="{{ asset('backend/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backend/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>

    <script src="{{ asset('backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>




    <script src="{{ asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('backend/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('backend/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('backend/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/vendor/flot/jquery.flot.resize.j') }}s"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('backend/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    {{-- <script src="{{ asset('backend/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script> --}}


    {{-- <script src="{{ asset('backend/js/dashboard/dashboard-1.js') }}"></script> --}}


    <script src="{{ asset('backend/vendor/summernote/js/summernote.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins-init/summernote-init.js') }}"></script>


    <script src="{{ asset('backend/vendor/jquery-validation/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('backend/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('backend/vendor/toastr/js/toastr.min.js') }}"></script>

    <!-- All init script -->
    <script src="{{ asset('backend/js/plugins-init/toastr-init.js') }}"></script>
</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {
        toastr.options = {
            positionClass: "toast-bottom-right",
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        };
        $('#tableData').DataTable();
        $('.selectpicker').selectpicker();
    });
</script>
@yield('javascrip')
<script>
    // text_slug
    // text_slug_result
    $("#text_slug").keyup(function() {
        var slug = $(this).val();
        slug = slug.toLowerCase();
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
            '');
        slug = slug.replace(/ /gi, "-");
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        $("#text_slug_result").val(slug);
    });
</script>
<script>
    function tinh(form) {
        var ketqua = '';
        var pricesale_product = '';
        var price_product = document.getElementById('price_product').value;
        var saleoff_product = document.getElementById('saleoff_product').value;
        if (isNaN(price_product) == true || isNaN(saleoff_product) == true) {
            alert('Sai cú pháp mời nhập lại !!!')
            var price_product = document.getElementById('price_product').value;
            var saleoff_product = document.getElementById('saleoff_product').value;
        } else {
            ketqua = (price_product * saleoff_product) / 100;
            document.getElementById('pricesale').value = ketqua;
            pricesale_product = (price_product - ketqua);
            document.getElementById('pricesale_product').value = pricesale_product;
        }
    }
</script>
