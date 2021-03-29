<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customers extends Authenticatable
{
    use HasFactory, Notifiable;


    function customers()
    {
        return [
            ['customerid'=>1, 'customerfirstname'=>'Nahida', 'customerlastname'=>'Yahiaoui',  'customeremail'=>'nahida@gmail.com', "password"=>" ","customerphone"=> " " , "customernumstreet"=>71, "customernamestreet"=>"avenue de luminy", "cp"=>13009, 'city'=>'luminy'],
            ['customerid'=>2, 'customerfirstname'=>'Celia', 'customerlastname'=>'Scherelle',  'customeremail'=>'celia@gmail.com', "password"=>" ","customerphone"=> " " , "customernumstreet"=>45, "customernamestreet"=>"rue de poitou", "cp"=>13012, 'city'=>'luminy'],
            ['customerid'=>3, 'customerfirstname'=>'Mohcine', 'customerlastname'=>'Zenagui',  'customeremail'=>'mohcine@gmail.com', "password"=>" ","customerphone"=> " " , "customernumstreet"=>112, "customernamestreet"=>"avenue des capucines", "cp"=>13004, 'city'=>'luminy'],
            ['customerid'=>4, 'customerfirstname'=>'Lotfi', 'customerlastname'=>'Habchi',  'customeremail'=>'lotfi@gmail.com', "password"=>" ","customerphone"=> " " , "customernumstreet"=>6, "customernamestreet"=>"boulevard magenta", "cp"=>13009, 'city'=>'luminy'],
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'numstreet',
        'namestreet',
        'cp',
    
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
