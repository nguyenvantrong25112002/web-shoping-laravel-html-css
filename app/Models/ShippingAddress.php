<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;
    protected $table = "shipping_address";
    protected $primaryKey = "id";
    public $fillable = [
        'bill_id',
        'customer_id',
        'full_name',
        'phone',
        'email',
        'city_province',
        'district',
        'commune_ward_town',
        'detailed_address',
        'default',
    ];
    protected $guarded = [];
    public $timestamps = false;
}