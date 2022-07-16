<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommuneWardTown extends Model
{
    use HasFactory;
    protected $table = "tbl_xaphuongthitran";
    protected $primaryKey = "";
    public $fillable = [
        'xaid',
        'name',
        'type',
        'maqh',
    ];
    protected $guarded = [];
    public $timestamps = true;
}