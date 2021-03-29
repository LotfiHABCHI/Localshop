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
            ['sellerid'=>1,  'sellerfirstname'=>'Karim', 'sellerlastname'=>'Nouioua', 'selleremail'=>'karim@gmail.com',  "password"=>" ", "sellerphone"=>'0660504080', 'siret'=>1213141312, "sellernumstreet"=>12, "sellernamestreet"=>"avenue de luminy", "cp"=>13009, "city"=>"luminy", "storename"=>"JAVAstore", "sellerimage"=> " ", "sellerdescription"=>" je vends de bonnes choses" ],
            ['sellerid'=>2,  'sellerfirstname'=>'Bertrand', 'sellerlastname'=>'Estellon', 'selleremail'=>'bertrand@gmail.com', "password"=>" ", 'sellerphone'=>'0630504070', 'siret'=>0102030405, "sellernumstreet"=>71, "sellernamestreet"=>"rue de lagny", "cp"=>13002, "city"=>"luminy", "storename"=>"WEBstore", "sellerimage"=> " ", "sellerdescription"=>" je vends de bonnes choses" ],
            ['sellerid'=>3,  'sellerfirstname'=>'Jean', 'sellerlastname'=>'Mari', 'selleremail'=>'jean@gmail.com', "password"=>" ", 'sellerphone'=>'0656435897', 'siret'=>7475767778, "sellernumstreet"=>135, "sellernamestreet"=>"avenue des godeaux", "cp"=>13010, "city"=>"luminy", "storename"=>"UNIXstore", "sellerimage"=> " ", "sellerdescription"=>" je vends de bonnes choses" ],
            ['sellerid'=>4,  'sellerfirstname'=>'Florian', 'sellerlastname'=>'Beguet', 'selleremail'=>'florian@gmail.com', "password"=>" ",  'sellerphone'=>'0656432548', 'siret'=>1213141516, "sellernumstreet"=>81, "sellernamestreet"=>"avenue des champs", "cp"=>13012, "city"=>"luminy", "storename"=>"ALLstore", "sellerimage"=> " ", "sellerdescription"=>" je vends de bonnes choses" ],
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
