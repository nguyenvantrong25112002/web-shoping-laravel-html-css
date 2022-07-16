  <div class="ps-cart__content">
      @if (Cart::count() == 0)
          <h3 style="padding: 18px; color: #ffff;">Chưa có sản phẩm nào !!</h3>
          <hr style="background-color: #ffff">
      @endif
      @if ($carts_pros != null)
          @foreach ($carts_pros as $carts_pro)
              <div class="ps-cart-item">
                  <div class="ps-cart-item__thumbnail">
                      <a href="#"></a>
                      @php
                          $img = $carts_pro->options;
                      @endphp
                      <img src="{{ asset("$URL_IMG_PRODUCT/$img->image") }}" alt="">
                  </div>
                  <div class="ps-cart-item__content">
                      <a class="ps-cart-item__title" href="#">
                          {{ $carts_pro->name }}
                      </a>
                      <div>
                          <p>
                              Size :
                              @foreach ($valueAttrs as $valueAttr)
                                  @if ($valueAttr->attrval_id == $carts_pro->options->size)
                                      <i>{{ $valueAttr->value }}</i>
                                  @endif
                              @endforeach
                          </p>
                          </td>
                          <p>Số lượng :<i>{{ $carts_pro->qty }}</i></p>
                          <p>Tổng tiền
                              :<i>{{ number_format($carts_pro->price, 0, ',', '.') }}</i>
                              VND</p>
                      </div>
                  </div>
                  <div data-id_cart="{{ $carts_pro->rowId }}" class="ps-remove ps-remove_cart">
                  </div>
              </div>
          @endforeach
      @endif

  </div>
  <div style="padding: 0 20px" class="">
      <input hidden id="qty_cart_hiden" type="text" value="{{ Cart::count() }}">
      <p>Số lượng sản phẩm: <span>{{ Cart::count() }}</span></p>
      <p>Tổng tiền(chưa thuế): <span>{{ Cart::subtotal(0, '', '.') }} VND</span></p>
  </div>


  <div class="ps-cart__footer">
      <a class="ps-btn py-4" href="{{ route('web.cart_product.cart') }}">Xem chi tiết<i
              class="ps-icon-arrow-left"></i>
      </a>
  </div>
