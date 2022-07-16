<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use App\Models\Address\District;
use App\Http\Controllers\Controller;
use App\Models\Address\CityProvince;
use Illuminate\Support\Facades\Auth;
use App\Models\Address\CommuneWardTown;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    public function get_district(Request $request)
    {
        $id_city_provinces = $request->id_city_provinces;
        $id_districts = $request->id_districts;
        if ($id_city_provinces != null) {
            $districts = District::where('matp', $id_city_provinces)->get();
            return response(['districts' => $districts]);
        }
        if ($id_districts != null) {
            $commune_tard_town = CommuneWardTown::where('maqh', $id_districts)->get();
            return response(['commune_tard_town' => $commune_tard_town]);
        }
    }
    public function addAddresCustomer(Request $request)
    {
        $this->addres_customer($request);
        return Redirect::back();
    }
    public function addAddresCustomerModal(Request $request)
    {
        $this->addres_customer($request);
        $shipping_address = Auth::guard('customer')->user()->load('shipping_address');
        $shipping_address = $shipping_address->shipping_address;
        return view('frontend.include.shipping_address.default', compact('shipping_address'));
    }
    protected  function addres_customer(Request $request)
    {
        $id_customer = Auth::guard('customer')->user()->id_customer;
        $city_province = CityProvince::where('matp', $request->city_province)->first()->name;
        $district = District::where('maqh', $request->district)->first()->name;
        $commune_ward_town = CommuneWardTown::where('xaid', $request->commune_ward_town)->first()->name;
        $customer_id =  Auth::guard('customer')->user()->id_customer;
        $model = new ShippingAddress();
        $shipping_address = Auth::guard('customer')->user()->load('shipping_address');
        $shipping_address = $shipping_address->shipping_address;
        if (!$shipping_address->count() > 0) {
            $model->default = config('util.ACTIVE_STATUS');
        } else {
            if (isset($request->default)) {
                if ($request->default == config('util.ACTIVE_STATUS')) {
                    ShippingAddress::where('customer_id', $id_customer)->where('default', config('util.ACTIVE_STATUS'))->first()
                        ->update(['default' => config('util.INACTIVE_STATUS')]);
                }
                $model->default =  $request->default;
            }
        }
        $model->city_province = $city_province;
        $model->district = $district;
        $model->commune_ward_town = $commune_ward_town;
        $model->detailed_address = $request->detailed_address;
        $model->full_name = $request->full_name;
        $model->phone = $request->phone;
        $model->email = $request->email;
        $model->customer_id = $customer_id;
        $model->save();
    }
    public function getAddresCustomer()
    {
        $shipping_address = Auth::guard('customer')->user()->load('shipping_address');
        $shipping_address = $shipping_address->shipping_address;
        return view('frontend.include.shipping_address.list', compact('shipping_address'));
    }

    public function getAddresCustomerDefault()
    {
        $shipping_address = Auth::guard('customer')->user()->load('shipping_address');
        $shipping_address = $shipping_address->shipping_address;
        return view('frontend.include.shipping_address.default', compact('shipping_address'));
    }

    public function setAddresCustomerDefault(Request $request)
    {
        $shipping_address_id = $request->id;
        $id_customer = Auth::guard('customer')->user()->id_customer;

        ShippingAddress::where('customer_id', $id_customer)->where('default', config('util.ACTIVE_STATUS'))->first()
            ->update(['default' => config('util.INACTIVE_STATUS')]);
        ShippingAddress::find($shipping_address_id)
            ->update(['default' => config('util.ACTIVE_STATUS')]);
        $shipping_address = Auth::guard('customer')->user()->load('shipping_address');
        $shipping_address = $shipping_address->shipping_address;
        return view('frontend.include.shipping_address.default', compact('shipping_address'));
    }
    public function destroy()
    {
        $id = $_GET['id'];
        ShippingAddress::find($id)->destroy($id);
        $shipping_address = Auth::guard('customer')->user()->load('shipping_address');
        $shipping_address = $shipping_address->shipping_address;
        return view('frontend.include.shipping_address.list', compact('shipping_address'));
    }
}