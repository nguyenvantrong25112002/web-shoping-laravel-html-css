<div class="row">
    @foreach ($shipping_address as $shipping_addres)
        <div class="col-sm-6 mb-5">
            <div class="shipping_address select_default {{ $shipping_addres->default === 1 ? 'default' : '' }}">
                <div class="py-3 px-3">
                    <h5 class="name">{{ $shipping_addres->full_name }}</h5>
                    <p>{{ $shipping_addres->phone }}</p>
                    <p>{{ $shipping_addres->commune_ward_town }}-{{ $shipping_addres->district }}-{{ $shipping_addres->city_province }}
                    </p>
                    <p>{{ $shipping_addres->detailed_address }}</p>
                    @if ($shipping_addres->default === 1)
                        <span class="text-default">Mặc định</span>
                    @endif
                </div>
                @if ($shipping_addres->default === 0)
                    <div class="action">
                        <button id="choose" data-shipping_address_id="{{ $shipping_addres->id }}"
                            class="btn btn-facebook">Đặt làm mặc định</button>
                        <button id="remove" data-shipping_address_id="{{ $shipping_addres->id }}"
                            class="btn btn-danger">Xóa</button>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
    <div class="col-sm-6 mb-5">
        <div class="shipping_address close ">
            <div class="close">
                <button id="get-addres-default" class="btn">
                    <i class="icofont-ui-close"></i>
                </button>
            </div>
        </div>
    </div>
</div>
