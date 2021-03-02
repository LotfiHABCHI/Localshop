<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Sellers extends Authenticatable
{
    use HasFactory, Notifiable;


    function sellers()
    {
        return [
            ['id'=>1, 'lastname'=>'Nouioua', 'firstname'=>'Karim', 'email'=>'karim@gmail.com', "password"=>" ","numstreet"=>12, "namestreet"=>"avenue de luminy", "CP"=>13009, 'tel'=>'0660504080',"storename"=>"JAVAstore", 'siren'=>1213141312],
            ['id'=>2, 'lastname'=>'Estellon', 'firstname'=>'Bertrand', 'email'=>'bertrand@gmail.com', "password"=>" ","numstreet"=>71, "namestreet"=>"rue de lagny", "CP"=>13002, 'tel'=>'0630504070',"storename"=>"WEBstore", 'siren'=>0102030405],
            ['id'=>3, 'lastname'=>'Mari', 'firstname'=>'Jean', 'email'=>'jean@gmail.com', "password"=>" ","numstreet"=>135, "namestreet"=>"avenue des godeaux", "CP"=>13010, 'tel'=>'0656435897',"storename"=>"UNIXstore", 'siren'=>7475767778],
            ['id'=>4, 'lastname'=>'Beguet', 'firstname'=>'Florian', 'email'=>'florian@gmail.com', "password"=>" ","numstreet"=>81, "namestreet"=>"avenue des champs", "CP"=>13012, 'tel'=>'0658748596',"storename"=>"ALLstore", 'siren'=>1213141516],
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
        'tel',
        'numstreet',
        'namestreet',
        'cp',
        'storename',
        'tel',
        'siren',
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
