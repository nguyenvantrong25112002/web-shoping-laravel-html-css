<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityProvince extends Model
{
    use HasFactory;
    protected $table = "tbl_tinhthanhpho";
    protected $primaryKey = "";
    public $fillable = [
        'matp',
        'name',
        'type'
    ];
    protected $guarded = [];
    public $timestamps = true;
}