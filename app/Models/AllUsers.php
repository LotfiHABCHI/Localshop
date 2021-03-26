<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\AllUsers as Authenticatable;
use Illuminate\Notifications\Notifiable;


class AllUsers extends Authenticatable
{
    use HasFactory, Notifiable;


      //protected $guard = 'people';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alluserfirstname',
        'alluseremail',
        'password',
        'roleid',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
