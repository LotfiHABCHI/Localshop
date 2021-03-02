<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProducts extends Model
{
    use HasFactory;

    function detailProducts()
    {
        return [
            ['productId'=>2, 'sellerId'=>1, 'stock'=>45],  //JAVAstore croissant
            ['productId'=>5, 'sellerId'=>3, 'stock'=>12],   //UNIXstore poulet
            ['productId'=>2, 'sellerId'=>4, 'stock'=>5],    //ALLstore  croissant
            ['productId'=>6, 'sellerId'=>2, 'stock'=>1],    //WEBstore  vin rouge
            ['productId'=>1, 'sellerId'=>4, 'stock'=>25],    //ALLstore  pomme1
            ['productId'=>7, 'sellerId'=>4, 'stock'=>2],    //ALLstore boeuf
            ['productId'=>8, 'sellerId'=>1, 'stock'=>28],   //JAVAstore  vin blanc
            ['productId'=>9, 'sellerId'=>2, 'stock'=>34],    //WEBstore carotte
            ['productId'=>10, 'sellerId'=>3, 'stock'=>78],   //UNIXstore pomme2
            ['productId'=>3, 'sellerId'=>3, 'stock'=>13],   //UNIXstore banane
            ['productId'=>4, 'sellerId'=>3, 'stock'=>6],   //UNIXstore courgette
        ];
    }
}
