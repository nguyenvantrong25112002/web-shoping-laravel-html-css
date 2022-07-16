<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = "banners";
    protected $primaryKey = "id_banner";
    public $fillable = [
        'img_banner',
        'title_banner',
        'url_banner',
        'slug_banner',
        'description_banner',
        'status_banner',
        'order_banner',
    ];
}