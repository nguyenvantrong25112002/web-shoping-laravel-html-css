@extends('frontend.layout')

@section('layout-conten')
    <div class="ps-checkout pt-80 pb-80">

        {{-- <form id="checkout__billing_1" data-payment="off" class="ps-checkout__form form js-form"
            action="{{ route('web.cart_product.add_bill_order') }}" method="post">
            @csrf --}}
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                <div class="ps-checkout__billing">
                    @if ($shipping_address->count() > 0)
                        <div class="shipping_addres-container">
                            <div id="shipping_addres-list" class="shipping_addres-list">
                                <div class="row">
                                    @foreach ($shipping_address as $shipping_addres)
                                        @if ($shipping_addres->default === 1)
                                            <div class="col-sm-6 mb-5">
                                                <div
                                                    class="shipping_address  {{ $shipping_addres->default === 1 ? 'default' : '' }}">
                                                    <div class="py-3 px-3">
                                                        <h5>{{ $shipping_addres->full_name }}</h5>
                                                        <p>{{ $shipping_addres->phone }}</p>
                                                        <p>{{ $shipping_addres->commune_ward_town }}-{{ $shipping_addres->district }}-{{ $shipping_addres->city_province }}
                                                        </p>
                                                        <p>{{ $shipping_addres->detailed_address }}</p>
                                                        @if ($shipping_addres->default === 1)
                                                            <span class="text-default">Mặc định</span>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="col-sm-6 mb-5">
                                        {{-- <div class="btn btn-secondary mb-4" data-toggler="#a">Chỉnh sửa</div>

                                        <div id="a" class="toggled"> --}} <button type="button" class="ps-btn mb-3 "
                                            data-toggle="modal" data-target="#exampleModal">
                                            Thêm thông tin đặt hàng mới
                                        </button>
                                        <button id="choose_default" class="ps-btn">Chọn địa chỉ mặc định
                                            khác</button>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered  modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Thông tin đặt hàng</h5>
                                            <button type="button" class="btn close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form id="addAddresCustomerModal" action="{{ route('web.address.add_bill') }}"
                                            method="post">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="form-group ">
                                                    <label>Họ và tên người nhận<span>*</span>
                                                    </label>
                                                    <input name="full_name"
                                                        value=" {{ Auth::guard('customer')->user()->name_customer }}"
                                                        class="form-control" type="text">
                                                </div>
                                                <div class="form-group ">
                                                    <label>Số điện thoại<span>*</span>
                                                    </label>
                                                    <input name="phone" class="form-control" type="text">
                                                </div>
                                                <div class="form-group ">
                                                    <label>Email<span>*</span>
                                                    </label>
                                                    <input name="email"
                                                        value=" {{ Auth::guard('customer')->user()->email_customer }}"
                                                        class="form-control" type="email">
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                                                        <div style="display: grid;" class="form-group ">
                                                            <label for="">Tỉnh thành phố</label>
                                                            <select name="city_province" class="select city_provinces"
                                                                data-live-search="true">
                                                                <option disabled selected>------------Chọn-------------
                                                                </option>
                                                                @foreach ($city_provinces as $city_province)
                                                                    <option
                                                                        data-tokens="{{ \Str::slug($city_province->name) }}"
                                                                        value="{{ $city_province->matp }}">
                                                                        {{ $city_province->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                                                        <div style="display: grid;" class="form-group ">
                                                            <label for="">Quận huyện</label>
                                                            <select name="district" id="districts" class="select districts">
                                                                <option disabled selected>------------Chọn-------------
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                                                        <div style="display: grid;" class="form-group ">
                                                            <label for="">Xã phường thị trấn</label>
                                                            <select name="commune_ward_town" id="commune_tard_town"
                                                                class="select commune_tard_town">
                                                                <option disabled selected>------------Chọn-------------
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label>Địa chỉ chi tiết<span>*</span>
                                                    </label>
                                                    <input name="detailed_address" class="form-control" type="text">
                                                </div>
                                                <div class="form-check form-switch d-flex align-items-center ">
                                                    <input name="default" value="1" class="form-check-input" type="checkbox"
                                                        id="default">
                                                    <label class="form-check-label mb-0 ms-2" for="default">Đặt làm mặc
                                                        định</label>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="ps-btn ">
                                                    Lưu thông tin
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="order-information">
                            <form id="addAddresCustomer" action="{{ route('web.address.add_bill') }}" method="post">
                                @csrf
                                <h3>Thông tin đặt hàng</h3>
                                <div class="form-group ">
                                    <label>Họ và tên người nhận<span>*</span>
                                    </label>
                                    <input name="full_name" value=" {{ Auth::guard('customer')->user()->name_customer }}"
                                        class="form-control" type="text">
                                </div>
                                <div class="form-group ">
                                    <label>Số điện thoại<span>*</span>
                                    </label>
                                    <input name="phone" class="form-control" type="text">
                                </div>
                                <div class="form-group ">
                                    <label>Email<span>*</span>
                                    </label>
                                    <input name="email" value=" {{ Auth::guard('customer')->user()->email_customer }}"
                                        class="form-control" type="email">
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                                        <div style="display: grid;" class="form-group ">
                                            <label for="">Tỉnh thành phố</label>
                                            <select name="city_province" class="select city_provinces"
                                                data-live-search="true">
                                                <option disabled selected>------------Chọn-------------</option>
                                                @foreach ($city_provinces as $city_province)
                                                    <option data-tokens="{{ \Str::slug($city_province->name) }}"
                                                        value="{{ $city_province->matp }}">
                                                        {{ $city_province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                                        <div style="display: grid;" class="form-group ">
                                            <label for="">Quận huyện</label>
                                            <select name="district" id="districts" class="select districts">
                                                <option disabled selected>------------Chọn-------------</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                                        <div style="display: grid;" class="form-group ">
                                            <label for="">Xã phường thị trấn</label>
                                            <select name="commune_ward_town" id="commune_tard_town"
                                                class="select commune_tard_town">
                                                <option disabled selected>------------Chọn-------------</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>Địa chỉ chi tiết<span>*</span>
                                    </label>
                                    <input name="detailed_address" class="form-control" type="text">
                                </div>

                                <button type="submit" class="ps-btn mt-4">
                                    Lưu thông tin
                                </button>
                            </form>
                        </div>
                    @endif


                    <h3 class=" mt-40">Thông tin bổ sung</h3>
                    <div class="form-group  textarea">
                        <label>Ghi chú đơn hàng (nếu có)</label>
                        <textarea id="textarea-1" name="order_notes" class="form-control js-character-count" maxlength="100"
                            aria-describedby="textarea-info-1" rows="5"
                            placeholder="Ghi chú của bạn tại đây .."></textarea>
                        <p id="textarea-info-1" class="field-text field-text--character-count js-field-text"
                            aria-live="polite"> 100 ký tự
                            còn lại</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                <div class="ps-checkout__order">
                    <header>
                        <h3>Hàng bạn đặt</h3>
                    </header>
                    <div class="content">
                        <table class="table ps-checkout__products">
                            <thead>
                                <tr>
                                    <th class="text-uppercase">Sản phẩm</th>
                                    <th class="text-uppercase">Tổng giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts_pros as $carts_pro)
                                    <tr style="border-bottom: 1px solid #fff;">
                                        <td>
                                            <i>{{ $carts_pro->name }}
                                            </i>
                                            <br>
                                            <span>Kích cỡ: {{ $carts_pro->options->attrval_id }}</span>
                                            <br>
                                            <span>x {{ $carts_pro->qty }}</span>
                                        </td>


                                        <td> {{ number_format($carts_pro->price * $carts_pro->qty, 0, ',', '.') }}
                                            VND
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>Tổng tiền chưa thuế</td>
                                    <td>{{ Cart::subtotal(0, '', '.') }} VND</td>
                                </tr>
                                <tr>
                                    <td>Thuế</td>
                                    <td>{{ Cart::tax(0, '', '.') }} VND</td>

                                </tr>
                                <tr>
                                    <td>Tổng tiền thanh toán</td>
                                    <td id="total" data-total="{{ round(Cart::total(0, '', '') / 22878, 2) }}">
                                        {{ Cart::total(0, '', '.') }} VND</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <footer>
                        <h3>Phương thức thanh toán</h3>

                        <div class="p-4">
                            <!-- Accordion -->
                            <div class="accordion js-accordion " data-id="accordion1">
                                <!-- Accordion item -->
                                <button type="button" id="accordionOne"
                                    class="{{ $shipping_address->count() <= 0 ? 'disabled' : '' }} accordion__button js-accordion__button is-active"
                                    aria-expanded="false" aria-controls="sectionOne">
                                    Thanh toán khi nhận hàng
                                </button>
                                <div id="sectionOne" class=" accordion__body js-accordion__body" role="region"
                                    aria-labelledby="accordionOne">
                                    <div style="padding: 20px;">
                                        <button id="checkout_bill"
                                            class="{{ $shipping_address->count() <= 0 ? 'disabled' : '' }} ps-btn ps-btn--fullwidth">
                                            <span>Đặt hàng</span>
                                        </button>
                                    </div>
                                </div>
                                <!--/ Accordion item -->

                                <!-- Accordion item -->
                                <button type="button" id="accordionFive"
                                    class="{{ $shipping_address->count() <= 0 ? 'disabled' : '' }} accordion__button js-accordion__button"
                                    aria-expanded="false" aria-controls="sectionFive">Thanh toán online</button>
                                <div id="sectionFive" class="accordion__body js-accordion__body" role="region"
                                    aria-labelledby="accordionFive">
                                    <div style="padding: 20px;">

                                        <div class="{{ $shipping_address->count() <= 0 ? 'disabled' : '' }}"
                                            id="paypal-button">
                                        </div>

                                    </div>
                                </div>
                                <!--/ Accordion item -->
                            </div>
                            <!--/ Accordion -->

                            @if ($shipping_address->count() <= 0)
                                <p>Bạn cần tạo thông tin đặt hàng mới có thể thao tác được !</p>
                            @endif

                        </div>

                    </footer>
                </div>
                <div class="ps-shipping mt-20">
                    <h3>Miễn phí vận chuyển</h3>
                    <p>
                        Đơn hàng của bạn được miễn phí vận chuyển
                    </p>
                </div>
                {{-- <div data-toggler="#a">Toggle button</div> --}}

                {{-- <div id="a" class="toggled">Toggled content
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit pariatur doloremque earum debitis optio
                    molestias ab aut est numquam eaque id voluptates accusamus hic iste, mollitia, recusandae culpa deserunt
                    eius!</div>
                    <br> --}}


            </div>
        </div>
        {{-- </form> --}}
    </div>

    <br>
@endsection

@section('javascrip.web')
    <script>
        class CharacterCount {
            constructor(context = document) {
                this.context = context;
                this.getElements();
                this.setElements();
                this.setEvents();
            }
            getElements() {
                this.elements = this.context.querySelectorAll('.js-character-count');
            }
            setElements() {
                this.elements.forEach(element => {
                    this.setCharacterCountText(element);
                });
            }
            setEvents() {
                this.elements.forEach(element => {
                    element.addEventListener('keydown', event => {
                        this.setCharacterCountText(event.target);
                    });
                    element.addEventListener('keyup', event => {
                        this.setCharacterCountText(event.target);
                    });
                });
            }
            setCharacterCountText(element) {
                const count = parseInt(element.getAttribute('maxlength')) - element.value.length;
                const text = count === 1 ? 'ký tự còn lại' : 'ký tự còn lại';
                element.nextElementSibling.innerHTML = `${count} ${text}`;
            }
        };
        const characterCount = new CharacterCount(document.querySelector('.js-form'));
    </script>
    <script>
        $("#addAddresCustomer").validate({
            onkeyup: false,
            rules: {
                full_name: {
                    required: true,
                },
                phone: {
                    required: true,
                    number: true,
                },
                email: {
                    required: true,
                },
                detailed_address: {
                    required: true,
                },
                city_province: {
                    required: true,
                },
                district: {
                    required: true,
                },
                commune_ward_town: {
                    required: true,
                },
            },
            messages: {},
        });


        $(document).on('click', '#checkout_bill', function(e) {
            e.preventDefault();
            checkout('off')
        });
        $('.form-group .city_provinces').selectric().on('change', function(e) {
            e.preventDefault();
            var id_city_provinces = $(this).val();
            // console.log(id_city_provinces);
            ajax_address(id_city_provinces, null);
        });
        $('.form-group .districts').selectric().on('change', function(e) {
            e.preventDefault();
            var id_districts = $(this).val();
            ajax_address(null, id_districts);
        });

        function ajax_address(id_city_provinces, id_districts) {
            $.ajax({
                type: "post",
                url: "{{ route('web.address.get_district') }}",
                data: {
                    id_city_provinces: id_city_provinces,
                    id_districts: id_districts,
                },
                success: function(response) {
                    var _html = "";
                    if (response.districts) {
                        $.each(response.districts, function(index, val) {
                            _html += "<option  value='" + val.maqh + "'>" + val.name + "</option>";
                        });
                        $('#districts').empty();
                        $('#districts').html(_html);
                        $('.select').selectric('refresh');
                    }
                    if (response.commune_tard_town) {
                        $.each(response.commune_tard_town, function(index, val) {
                            _html += "<option  value='" + val.xaid + "'>" + val.name + "</option>";
                        });
                        $('#commune_tard_town').empty();
                        $('#commune_tard_town').html(_html);
                        $('.select').selectric('refresh');
                    }

                }
            });
        }
    </script>

    <script>
        'use strict';

        class Accordion {
            constructor(element, options = {}) {
                this.accordion = element;
                this.buttons = null;
                this.bodies = null;
                this.options = {
                    activeClassName: 'is-active',
                    closeOthers: true,
                    ...options
                };


                this.handleKeydown = this.handleKeydown.bind(this);
                this.handleClick = this.handleClick.bind(this);
                this.handleTransitionend = this.handleTransitionend.bind(this);

                this.init();
            }

            init() {
                if (this.accordion.classList.contains('is-init-accordion')) {
                    throw Error('Accordion is already initialized.');
                }

                this.buttons = [...this.accordion.querySelectorAll('.js-accordion__button')];
                this.bodies = [...this.accordion.querySelectorAll('.js-accordion__body')];

                // Handle active accordion item
                for (const button of this.buttons) {
                    if (!button.classList.contains(this.options.activeClassName)) continue;
                    button.setAttribute('aria-expanded', 'true');
                    const body = button.nextElementSibling;
                    body.style.display = 'block';
                    body.style.maxHeight = 'none';
                }

                // Hide all bodies except the active
                for (const body of this.bodies) {
                    if (body.previousElementSibling.classList.contains(this.options.activeClassName)) continue;
                    body.style.display = 'none';
                    body.style.maxHeight = '0px';
                }

                this.addEvents();

                this.accordion.classList.add('is-init-accordion');
            }

            closeOthers(elException) {
                for (const button of this.buttons) {
                    if (button === elException) continue;
                    button.classList.remove(this.options.activeClassName);
                    button.setAttribute('aria-expanded', 'false');
                    const body = button.nextElementSibling;
                    body.style.maxHeight = `${body.scrollHeight}px`;
                    setTimeout(() => void(body.style.maxHeight = '0px'), 0);
                }
            }

            handleKeydown(event) {
                const target = event.target;
                const key = event.which.toString();

                if (target.classList.contains('js-accordion__button') && key.match(/35|36|38|40/)) {
                    event.preventDefault();
                } else {
                    return false;
                }

                switch (key) {
                    case '36':
                        // "Home" key
                        this.buttons[0].focus();
                        break;
                    case '35':
                        // "End" key
                        this.buttons[this.buttons.length - 1].focus();
                        break;
                    case '38':
                        // "Up Arrow" key
                        const prevIndex = this.buttons.indexOf(target) - 1;
                        if (this.buttons[prevIndex]) {
                            this.buttons[prevIndex].focus();
                        } else {
                            this.buttons[this.buttons.length - 1].focus();
                        }
                        break;
                    case '40':
                        // "Down Arrow" key
                        const nextIndex = this.buttons.indexOf(target) + 1;
                        if (this.buttons[nextIndex]) {
                            this.buttons[nextIndex].focus();
                        } else {
                            this.buttons[0].focus();
                        }
                        break;
                }

            }

            handleClick(event) {
                const button = event.currentTarget;
                const body = button.nextElementSibling;

                if (this.options.closeOthers) {
                    this.closeOthers(button);
                }

                // Set height to the active body
                if (body.style.maxHeight === 'none') {
                    body.style.maxHeight = `${body.scrollHeight}px`;
                }

                if (button.classList.contains(this.options.activeClassName)) {
                    // Close accordion item
                    button.classList.remove(this.options.activeClassName);
                    button.setAttribute('aria-expanded', 'false');
                    setTimeout(() => void(body.style.maxHeight = '0px'), 0);
                } else {
                    // Open accordion item
                    button.classList.add(this.options.activeClassName);
                    button.setAttribute('aria-expanded', 'true');
                    body.style.display = 'block';
                    body.style.maxHeight = `${body.scrollHeight}px`;
                }
            }

            handleTransitionend(event) {
                const body = event.currentTarget;
                if (body.style.maxHeight !== '0px') {
                    // Remove the height from the active body
                    body.style.maxHeight = 'none';
                } else {
                    // Hide the active body
                    body.style.display = 'none';
                }
            }

            addEvents() {
                this.accordion.addEventListener('keydown', this.handleKeydown);
                for (const button of this.buttons) {
                    button.addEventListener('click', this.handleClick);
                }
                for (const body of this.bodies) {
                    body.addEventListener('transitionend', this.handleTransitionend);
                }
            }

            destroy() {
                this.accordion.removeEventListener('keydown', this.handleKeydown);
                for (const button of this.buttons) {
                    button.removeEventListener('click', this.handleClick);
                }
                for (const body of this.bodies) {
                    body.addEventListener('transitionend', this.handleTransitionend);
                }

                this.buttons = null;
                this.bodies = null;

                this.accordion.classList.remove('is-init-accordion');
            }
        }
        window.addEventListener('DOMContentLoaded', () => {
            const accordionEls = [...document.querySelectorAll('.js-accordion')];
            for (const accordionEl of accordionEls) {
                new Accordion(accordionEl);
            }
        });
    </script>

    <script>
        $("#addAddresCustomerModal").validate({
            onkeyup: false,
            rules: {
                full_name: {
                    required: true,
                },
                phone: {
                    required: true,
                    number: true,
                },
                email: {
                    required: true,
                },
                detailed_address: {
                    required: true,
                },
                city_province: {
                    required: true,
                },
                district: {
                    required: true,
                },
                commune_ward_town: {
                    required: true,
                },
            },
            messages: {},

        });
        $(document).on('submit', '#addAddresCustomerModal', function(e) {
            e.preventDefault();
            var form = $(this);
            var data = form.serialize();
            console.log(data);
            $.ajax({
                type: "post",
                url: "{{ route('web.address.add_bill_modal') }}",
                data: data,
                success: function(response) {
                    $('#shipping_addres-list').empty();
                    $('#shipping_addres-list').html(response);
                    $('#exampleModal').modal('toggle')
                }
            });

        });
        $(document).on('click', '#choose_default', function(e) {
            e.preventDefault();

            $.ajax({
                type: "get",
                url: "{{ route('web.address.list_bill') }}",
                success: function(response) {
                    $('#shipping_addres-list').empty();
                    $('#shipping_addres-list').html(response);
                }
            });
        });

        $(document).on('click', '#get-addres-default', function(e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "{{ route('web.address.default_bill') }}",
                success: function(response) {
                    $('#shipping_addres-list').empty();
                    $('#shipping_addres-list').html(response);
                }
            });
        });
        $(document).on('click', '.shipping_address .action #choose', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-shipping_address_id');
            $.ajax({
                type: "post",
                url: "{{ route('web.address.setdefault_bill') }}",
                data: {
                    id: id
                },
                success: function(response) {
                    $('#shipping_addres-list').empty();
                    $('#shipping_addres-list').html(response);
                }
            });
        });

        $(document).on('click', '.shipping_address .action #remove', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-shipping_address_id');
            // alert(id)
            $.ajax({
                type: "get",
                url: "{{ route('web.address.destroy'), '+id+' }}",
                data: {
                    id: id
                },
                success: function(response) {
                    $('#shipping_addres-list').empty();
                    $('#shipping_addres-list').html(response);
                }
            });
        });
    </script>


    {{-- checkout paypal --}}
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'Aa3IsfpZbN3_UMPVaosZLAojFLXytHeGQ-cDEnmFZjfvcrPp4SnQi8dosZfM9AojTjNOE8iC_UEJfC2v',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'large',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: '0.01',
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    checkout('on')
                });
            }
        }, '#paypal-button');
    </script>


    <script>
        function checkout(payment) {
            // let payment = this.payment;
            let order_notes = $('textarea[name=order_notes]').val();
            console.log(order_notes);
            $.ajax({
                type: "post",
                url: "{{ route('web.cart_product.add_bill_order') }}",
                data: {
                    payment: payment,
                    order_notes: order_notes
                },
                success: function(response) {
                    if (response.status == true) {
                        toastr.success(response.payload);
                        setTimeout(() => {
                            window.location.href = response.backurl
                        }, 2000);
                    }
                }
            });
        }
    </script>
@endsection
