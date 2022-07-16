<div class="row">
    @foreach ($shipping_address as $shipping_addres)
        @if ($shipping_addres->default === 1)
            <div class="col-sm-6 mb-5">
                <div class="shipping_address {{ $shipping_addres->default === 1 ? 'default' : '' }} py-3 px-3">
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
        @endif
    @endforeach
    <div class="col-sm-6 mb-5">
        <button type="button" class="ps-btn mb-3 " data-toggle="modal" data-target="#exampleModal">
            Thêm thông tin đặt hàng mới
        </button>
        <button id="choose_default" class="ps-btn">
            Chọn địa chỉ mặc định khác
        </button>
    </div>
</div>
