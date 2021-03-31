<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class AllUsers extends Authenticatable
{
    use HasFactory, Notifiable;

    function allusers(){

        return [
            ['alluserid'=>1, 'alluserfirstname'=>'Ivan',  'alluseremail'=>'v1@gmail.com', 'password'=>'azertyuiop', 'allusersellerid'=>1, 'allusercustomerid'=>null, 'roleid'=>1],
            ['alluserid'=>2, 'alluserfirstname'=>'Jeanne',  'alluseremail'=>'v2@gmail.com', 'password'=>'azertyuiop', 'allusersellerid'=>2, 'allusercustomerid'=>null, 'roleid'=>1],
            ['alluserid'=>3, 'alluserfirstname'=>'Ursula',  'alluseremail'=>'v3@gmail.com', 'password'=>'azertyuiop', 'allusersellerid'=>3, 'allusercustomerid'=>null, 'roleid'=>1],
            ['alluserid'=>4, 'alluserfirstname'=>'Will', 'alluseremail'=>'v4@gmail.com', 'password'=>'azertyuiop', 'allusersellerid'=>4, 'allusercustomerid'=>null, 'roleid'=>1],
            ['alluserid'=>5, 'alluserfirstname'=>'Audrey',  'alluseremail'=>'c1@gmail.com', 'password'=>'azertyuiop', 'allusersellerid'=>null, 'allusercustomerid'=>1, 'roleid'=>2],
            ['alluserid'=>6, 'alluserfirstname'=>'Reina',  'alluseremail'=>'c2@gmail.com', 'password'=>'azertyuiop', 'allusersellerid'=>null, 'allusercustomerid'=>2, 'roleid'=>2],
            ['alluserid'=>7, 'alluserfirstname'=>'Naruto',  'alluseremail'=>'c3@gmail.com', 'password'=>'azertyuiop', 'allusersellerid'=>null, 'allusercustomerid'=>3, 'roleid'=>2],
            ['alluserid'=>8, 'alluserfirstname'=>'Lofti',  'alluseremail'=>'c4@gmail.com', 'password'=>'azertyuiop', 'allusersellerid'=>null, 'allusercustomerid'=>4, 'roleid'=>2]


        ];

    }
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
