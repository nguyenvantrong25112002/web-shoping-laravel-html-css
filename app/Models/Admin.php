<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use  Notifiable, HasFactory, HasRoles;
    protected $table = "admins";
    protected $primaryKey = "id_admin";
    public $fillable = [
        'admin_name',
        'admin_img',
        'admin_email',
        'admin_pass',
        'admin_remember',
        'admin_token',
        'admin_phone',
        'admin_rank',
        'admin_address',
    ];
    protected $guarded = 'admins';

    public $guard_name = 'web';


    protected $hidden = [
        'admin_pass', 'admin_remember',
    ];
    public function getAuthPassword()
    {
        return $this->admin_pass;
    }

    public function username()
    {
        return 'admin_email';
    }
}


// namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

// class Admin extends Authenticatable
// {
//     use HasApiTokens, HasFactory, Notifiable;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var string[]
//      */
//     protected $table = "tbl_admin";

//     protected $primaryKey = "id_admin";
//     public $fillable = [
//         'admin_name',
//         'admin_img',
//         'admin_email',
//         'admin_pass',
//         'admin_phone',
//         'admin_rank',
//         'admin_address',
//     ];

/**
//     //  * The attributes that should be hidden for serialization.
//     //  *
//     //  * @var array
//     //  */
//     // protected $hidden = [
//     //     'password',
//     //     'remember_token',
//     // ];

//     // /**
//     //  * The attributes that should be cast.
//     //  *
//     //  * @var array
//     //  */
//     // protected $casts = [
//     //     'email_verified_at' => 'datetime',
//     // ];
// }