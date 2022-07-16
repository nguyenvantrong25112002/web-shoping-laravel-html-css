<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id_product";
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public $fillable = [
        'name_product',
        'slug_product',
        'img_product',
        'imggallery_product',
        'price_product',
        'pricesale_product',
        'saleoff_product',
        'quantity_product',
        'description_product',
        'details_product',
        'status_product',
        'view_product',
        'created_at',
        'updated_at',
    ];

    public function in_many_categorys()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }
    public function categorys()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }
    public function hasManyGallery()
    {
        return $this->hasMany(Gallery::class, 'product_id', 'id_product')->select('id');
    }

    public function scopeSearch($query)
    {
        if (request('key')) {
            $key = request('key');
            $query = $query->where('name_product', 'like', '%' . $key . '%');
        }
        return $query;
    }



    public function in_many_attr()
    {
        return $this->belongsToMany(AttributeValue::class, 'attr_value_product', 'id_product', 'attrval_id');
    }
}