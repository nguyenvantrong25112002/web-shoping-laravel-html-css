<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function return_cart_home()
    {
        $carts_pros =  Cart::content()->take(3);
        $valueAttrs = AttributeValue::all();
        return view('frontend.include.cart.ps-cart__content', compact(
            'carts_pros',
            'valueAttrs',
        ));
    }

    public function add_cart(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'attrval_id' => 'required',
            ],
            [
                'attrval_id.required' => 'Vui lòng chọn size !!',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        $id_product = $request->id_product;
        $attr = AttributeValue::find($request->attrval_id);
        $product = Product::find($id_product);
        Cart::add([
            'id' =>  $product->id_product,
            'name' => $product->name_product,
            'qty' => 1,
            'price' => $product->pricesale_product,
            'weight' => 0,
            'options' => [
                'image' =>  $product->img_product,
                'size' => $attr->attrval_id,
                'attrval_id' => $attr->value,
            ]
        ]);
        Cart::setGlobalTax(0.5);
        return $this->return_cart_home();
    }
    public function list_cart_home()
    {
        return $this->return_cart_home();
    }




    //cart page
    public function return_cart()
    {
        $carts_pros =  Cart::content();
        $productAttributes = ProductAttribute::where('status', 1)->get();
        return view('frontend.include.cart.ps-cart-listing_page', compact(
            'carts_pros',
            'productAttributes',
        ));
    }
    public function cart()
    {
        $carts_pros =  Cart::content();
        $productAttributes = ProductAttribute::where('status', 1)->get();
        return view('frontend.page.cart_product', compact(
            'carts_pros',
            'productAttributes',
        ));
    }
    public function list_cart()
    {
        return $this->return_cart();
    }
    public function remove_cart(Request $request)
    {
        $rowId  = $request->rowId;
        $cart =  Cart::get($rowId);
        if ($cart) {
            Cart::remove($rowId);
        }
        return $this->return_cart();
    }



    public function remove_cart_all()
    {
        Cart::destroy();
        return $this->return_cart();
    }
    public function update_cart(Request $request)
    {
        $rowId = $request->rowId;
        $qty  = $request->value;
        Cart::update($rowId,  $qty);
        return $this->return_cart();
    }
    public function update_cart_size(Request $request)
    {
        $rowId = $request->rowId;
        $id_attr  = $request->id_attr;
        $attr = AttributeValue::find($id_attr)->value;
        // dump($attr);
        // dd($id_attr);
        $item = Cart::get($rowId);
        $img = $item->options->image;
        Cart::update($rowId, ['options' => [
            'size' => $id_attr,
            'attrval_id' => $attr,
            'image' => $img,
        ]]);
        return $this->return_cart();
    }
}