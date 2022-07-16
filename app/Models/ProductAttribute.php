<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table = "product_attribute";
    protected $primaryKey = "proattr_id";
    public $fillable = [
        'name',
        'order',
        'status',
    ];
    protected $guarded = [];
    public function hasManyAttributeVal()
    {
        return $this->hasMany(AttributeValue::class, 'product_attribute_id', 'proattr_id');
    }
}