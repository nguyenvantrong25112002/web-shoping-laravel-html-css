<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBill extends Model
{
    use HasFactory;
    protected $table = "status_bills";
    protected $primaryKey = "id";
    public $fillable = [
        'name',
        'order_status_bills',
        'active'
    ];
    protected $guarded = [];
    public $timestamps = false;
}