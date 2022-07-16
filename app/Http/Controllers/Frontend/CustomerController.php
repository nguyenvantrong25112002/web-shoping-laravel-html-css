<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Jobs\SendMailSignUpJob;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function form_sign_in()
    {
        return view('frontend.page.account.sign_in');
    }
    public function form_sign_up()
    {
        return view('frontend.page.account.sign_up');
    }

    public function updateStatus()
    {
        $id_customer = $_GET['id_customer'];
        $token_customer = $_GET['token_customer'];
        if ($token_customer != null) {
            $customer = Customer::where('id_customer', $id_customer)->where('token_customer', $token_customer)->first();
            // dd($customer);
            if ($customer != null) {
                # code...
                $customer->status_customer = 1;
                $customer->token_customer = null;
                $customer->save();
                return Redirect::back()->with('msg', 'Kích hoạt tài khoản thành công !!');
            } else {
                return Redirect::back()->with('msg', 'Tài khoản này đã được kích hoạt !!');
            }
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name_customer' => 'required',
                'email_customer' => 'required|unique:customers|email',
                'password_customer' => 'required|min:6',
            ],
            [
                'name_customer.required' => 'Chưa nhập họ tên !!!',
                'email_customer.required' => 'Chưa nhập email !!!',
                'email_customer.unique' => 'Email này đã tồn tại !!!',
                'email_customer.email' => 'Sai định dạnh email !!!',
                'password_customer.required' => 'Chưa nhập mật khẩu !!!',
                'password_customer.min' => 'Mật khẩu ít nhất 6 kí tự !!!',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $name_customer = $request->name_customer;
        $email_customer = $request->email_customer;
        $password_customer = $request->password_customer;
        $token_customer = uniqid(5) . Str::random(5);
        $model = new Customer();
        $model->name_customer = $name_customer;
        $model->email_customer = $email_customer;
        $model->password_customer = bcrypt($password_customer);
        $model->status_customer = 0;
        $model->token_customer = $token_customer;
        $model->save();

        $id_customer = $model->id_customer;
        // $id_customer = 59;

        $data = [
            'name_customer' => $name_customer,
            'password_customer' => $password_customer,
            'id_customer' => $id_customer,
            'token_customer' => $token_customer,
        ];

        dispatch(new SendMailSignUpJob($email_customer, $data));  // job SendMailSignUp
        return response()->json([
            'code' => 1,
            'success' => 'Đăng kí thành công !!',
        ]);
    }
    public function loginCustomer(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email_customer' => 'required',
                'password_customer' => 'required',
            ],
            [
                'email_customer.required' => 'Chưa nhập email !!!',
                'password_customer.required' => 'Chưa nhập mật khẩu !!',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $email_customer = $request->email_customer;
        $password_customer = $request->password_customer;
        $customer = Customer::where('email_customer', $email_customer)->first();
        if ($customer == null) {
            return response()->json([
                'code' => 1,
                'error' => 'Tài khoản này không tồn tại trên hệ thống !!',
            ]);
        } else {
            if ($customer->status_customer == 0) {
                # code...
                return response()->json([
                    'code' => 1,
                    'error' => 'Tài khoản này chưa được kích hoạt !!',
                    'warning' => 'Vui lòng vào gmail để kích hoạt !!',
                ]);
            } else {
                if (Auth::guard('customer')->attempt([
                    'email_customer' => $email_customer, 'password' => $password_customer
                ])) {

                    return response()->json([
                        'code' => 2,
                        'msg' => 'Đăng nhập thành công !!',
                        'url' => route('web.home')
                    ]);
                }
            }
        }
        // dd($customer->status_customer);
    }
    public function logoutCustomer()
    {
        Auth::guard('customer')->logout();
        return Redirect::route('web.home')->with('msg', 'Đã đăng xuất tài khoản trên hệ thống !!');
    }
}