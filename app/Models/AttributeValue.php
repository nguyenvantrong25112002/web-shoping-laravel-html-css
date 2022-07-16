<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    protected $table = "attribute_value";
    protected $primaryKey = "attrval_id";
    public $fillable = [
        'product_attribute_id',
        'value',
        // 'product_id',
    ];
    protected $guarded = [];
}