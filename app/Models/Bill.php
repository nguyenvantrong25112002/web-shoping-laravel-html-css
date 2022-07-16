<?php

namespace App\Models;

use App\Models\DetailedBills;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory;
    protected $table = "order_bills";
    protected $primaryKey = "id_bill";
    public $fillable = [
        'shipping_address_id',
        'order_notes',
        'customer_id',
        'code_bill',
        'payment',
        'total_money',
        'status_bill',
        'subtotal',
        'tax_vat',
        'token_bill',
        'qty_product',
    ];
    // protected $guarded = [];

    public function detail_bill()
    {
        return $this->hasMany(DetailedBills::class, 'bill_id', 'id_bill');
    }
}