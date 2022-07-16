<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Models\Bill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DetailedBills;
use App\Http\Controllers\Controller;
use App\Models\Address\CityProvince;
use App\Models\Address\CommuneWardTown;
use App\Models\Address\District;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\StatusBill;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{

    public function checkout_cart(Request $request)
    {
        // dd(config('util.ACTIVE_STATUS'));

        $shipping_address = Auth::guard('customer')->user()->load('shipping_address');
        $shipping_address = $shipping_address->shipping_address;

        $carts_pros =  Cart::content();
        if ($carts_pros != null && $carts_pros->count() <= 0) {
            return back()->with('err', 'Chưa có sản phẩm trên giỏ hàng !!');
        } else {

            $city_provinces = CityProvince::all();
            return view(
                'frontend.page.checkout_cart',
                compact(
                    'carts_pros',
                    'city_provinces',
                    'shipping_address',
                )
            );
        }
    }
    public function add_bill_order(Request $request)
    {
        $id_customer = Auth::guard('customer')->user()->id_customer;
        $shipping_address_id = ShippingAddress::where('customer_id', $id_customer)->where('default', config('util.ACTIVE_STATUS'))->first()->id;
        $token_bill = Str::random(20);
        $code_bill = time() . rand(000001, 999999);
        $total_money =   Cart::total(0, '', '');
        $subtotal =  Cart::subtotal(0, '', '');
        $tax_vat = Cart::tax(0, '', '');
        $carts_pros =  Cart::content();









        DB::beginTransaction();
        try {
            $bill = Bill::create([
                'shipping_address_id' => $shipping_address_id,
                'order_notes' => $request->order_notes,
                'customer_id' => $id_customer,
                'code_bill' => $code_bill,
                'payment' => $request->payment,
                'total_money' => $total_money,
                'status_bill' => 0,
                'subtotal' => $subtotal,
                'tax_vat' => $tax_vat,
                'token_bill' => $token_bill,
            ]);


            if ($bill) {
                foreach ($carts_pros as $carts_pro) {
                    $data_datail_bill = [
                        'name_product' => $carts_pro->name,
                        'price_product' => number_format($carts_pro->price, 0, ',', ''),
                        'bill_id' => $bill->id_bill,
                        'product_id' => $carts_pro->id,
                        'quantily' => $carts_pro->qty,
                        'price' => number_format($carts_pro->price * $carts_pro->qty, 0, ',', ''),
                        'attribute' => $carts_pro->options->attrval_id,
                    ];
                    DetailedBills::create($data_datail_bill);
                }
                $qty_product = $bill->detail_bill->sum('quantily');;
                $bill->update([
                    'qty_product' => $qty_product,
                ]);
            }
            DB::commit();
            return response()->json([
                'status' => true,
                'payload' => 'Đặt hàng thành công !',
                'backurl' => route('web.cart_product.list_bill')
            ]);
        } catch (Exception $ex) {
            // Log::error("Lỗi tạo tài khoản:");
            // Log::info("post data: " . json_encode($request->all()));
            DB::rollBack();
            return response()->json([
                'status' => false,
                'payload' => $ex->getMessage()
            ]);
        }
    }

    public function check_token()
    {
        if (isset($_GET['id_bill'])) {
            $id_bill = $_GET['id_bill'];
            $token = $_GET['token'];
            $bill = Bill::where('id_bill', $id_bill)
                ->where('token_bill', $token)->first();
            if ($bill != null) {
                if (!$bill->status_bill === 0) {
                    return Redirect::back()->with('msg', 'Đơn hàng này đã được kích hoạt !!');
                }
                if ($bill->status_bill === 0) {
                    $bill->status_bill = 1;
                    $bill->token_bill = null;
                    $bill->save();

                    return Redirect::back()->with('msg', 'Đơn hàng đã được kích hoạt !!');
                }
            } else {
                return Redirect::back()->with('msg', 'Không kích hoạt lần 2 !!');
            }
        }
    }
    public function list_bill()
    {
        if (Auth::guard('customer')->check()) {
            $status_bills = StatusBill::orderBy('order_status_bills', 'desc')->get();
            $products = Product::where('status_product', 0)->get();
            $id_customer =   Auth::guard('customer')->user()->id_customer;
            $bills  = Bill::where('customer_id', $id_customer)->get();
            return view('frontend.page.list_bill_order', compact(
                'bills',
                'products',
                'status_bills'
            ));
        }
    }
}