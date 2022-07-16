<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categorys";
    protected $primaryKey = "id_category";
    public $fillable = [
        'name_category',
        'order_category',
        'status_category',
        'parent_id',
        'slug_category',
    ];

    public function categoryChildrent()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categoryChildrent');
    }
    // trỏ đến danh mục có parent_id
    // wiht('categoryChildrent') lấy ra tất cả danh mục cả cha lẫn con 
    // has('categoryChildrent') lấy ra danh mục có con
    // wiht('categoryChildrent')->has('categoryChildrent')  lấy ra danh mục có con và in ra danh mục con đó
    public function in_many_products()
    {
        return $this->belongsToMany(Product::class, 'category_product', 'category_id', 'product_id');
    }
}