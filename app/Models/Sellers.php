<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Sellers extends Authenticatable
{
    use HasFactory, Notifiable;

   //protected $guard = 'sellers';


    function sellers()
    {
        return [
            ['id'=>1, 'lastname'=>'Nouioua', 'firstname'=>'Karim', 'email'=>'karim@gmail.com',"phone"=>'0660504080', "password"=>"abcdefgh","numstreet"=>12, "namestreet"=>"avenue de luminy", "postcode"=>13009, "city"=>"luminy", "storename"=>"JAVAstore", 'siret'=>1213141312],
            ['id'=>2, 'lastname'=>'Estellon', 'firstname'=>'Bertrand', 'email'=>'bertrand@gmail.com','phone'=>'0630504070', "password"=>" ","numstreet"=>71, "namestreet"=>"rue de lagny", "postcode"=>13002, "city"=>"luminy", "storename"=>"WEBstore", 'siret'=>0102030405],
            ['id'=>3, 'lastname'=>'Mari', 'firstname'=>'Jean', 'email'=>'jean@gmail.com','phone'=>'0656435897', "password"=>" ","numstreet"=>135, "namestreet"=>"avenue des godeaux", "postcode"=>13010, "city"=>"luminy", "storename"=>"UNIXstore", 'siret'=>7475767778],
            ['id'=>4, 'lastname'=>'Beguet', 'firstname'=>'Florian', 'email'=>'florian@gmail.com', 'phone'=>'0656432548', "password"=>" ","numstreet"=>81, "namestreet"=>"avenue des champs", "postcode"=>13012, "city"=>"luminy", "storename"=>"ALLstore", 'siret'=>1213141516],
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
        'phone',
        'password',
        'numstreet',
        'namestreet',
        'postcode',
        'city',
        'storename',
        'siret',
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
