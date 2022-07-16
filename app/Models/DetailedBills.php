<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailedBills extends Model
{
    use HasFactory;
    protected $table = "detailed_bills";
    protected $primaryKey = "id_detailed_bills";
    public $fillable = [
        'name_product',
        'price_product',
        'bill_id',
        'product_id',
        'quantily',
        'price',
        'attribute',
    ];
    protected $guarded = [];
    // public $timestamps = true;
}