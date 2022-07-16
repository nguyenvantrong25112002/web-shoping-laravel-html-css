<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use  Notifiable, HasFactory;
    protected $table = "customers";
    protected $primaryKey = "id_customer";
    public $fillable = [
        'name_customer',
        'img_customer',
        'email_customer',
        'phone_customer',
        'password_customer',
        'address_customer',
        'birthday_customer',
        'status_customer',
        'token_customer',
        'remember_customer',
        'google_id',
    ];
    protected $guarded = 'customer';
    protected $hidden = [
        'password_customer', 'remember_customer',
    ];
    public function getAuthPassword()
    {
        return $this->password_customer;
    }
    public function username()
    {
        return 'email_customer';
    }


    public function customer_bills()
    {
        return $this->hasMany(Bill::class, 'id_bill', 'id_customer');
    }
    public function shipping_address()
    {
        return $this->hasMany(ShippingAddress::class, 'customer_id', 'id_customer');
    }
}