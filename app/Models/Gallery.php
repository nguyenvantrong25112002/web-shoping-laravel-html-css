<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = "gallery_products";
    protected $primaryKey = "id_gallery";
    public $fillable = [
        'product_id',
        'order_gallery',
        'img_gallery',
    ];
}