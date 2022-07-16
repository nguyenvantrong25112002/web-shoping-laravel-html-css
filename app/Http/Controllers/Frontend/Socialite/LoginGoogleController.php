<?php

namespace App\Http\Controllers\Frontend\Socialite;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;


class LoginGoogleController extends Controller
{
    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback_google()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);
        return Redirect::route('web.home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = Customer::where('email_customer',  $data->email)->first();
        if (!$user) {
            $user = new Customer();
            $user->name_customer = $data->name;
            $user->email_customer = $data->email;
            $user->google_id = $data->id;
            $user->status_customer = 1;
            $user->save();
        }
        Auth::guard('customer')->login($user);
    }
}