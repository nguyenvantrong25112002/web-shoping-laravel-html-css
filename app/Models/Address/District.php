<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = "tbl_quanhuyen";
    protected $primaryKey = "";
    public $fillable = [
        'maqh',
        'name',
        'type',
        'matp'
    ];
    protected $guarded = [];
    // public $timestamps = true;
}