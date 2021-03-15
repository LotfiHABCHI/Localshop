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
            ['id'=>1, 'lastname'=>'Yahiaoui', 'firstname'=>'Nahida', 'email'=>'nahida@gmail.com', "password"=>" ","numstreet"=>71, "namestreet"=>"avenue de luminy", "postcode"=>13009, 'city'=>'luminy'],
            ['id'=>2, 'lastname'=>'Scherelle', 'firstname'=>'Celia', 'email'=>'celia@gmail.com', "password"=>" ","numstreet"=>45, "namestreet"=>"rue de poitou", "postcode"=>13012, 'city'=>'luminy'],
            ['id'=>3, 'lastname'=>'Zenagui', 'firstname'=>'Mohcine', 'email'=>'mohcine@gmail.com', "password"=>" ","numstreet"=>112, "namestreet"=>"avenue des capucines", "postcode"=>13004, 'city'=>'luminy'],
            ['id'=>4, 'lastname'=>'Habchi', 'firstname'=>'Lotfi', 'email'=>'lotfi@gmail.com', "password"=>" ","numstreet"=>6, "namestreet"=>"boulevard magenta", "postcode"=>13009, 'city'=>'luminy'],
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
