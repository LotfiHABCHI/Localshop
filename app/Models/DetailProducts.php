<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProducts extends Model
{
    use HasFactory;

    function detailProducts()
    {

       /* return [
            ['productid'=>2, 'sellerid'=>1],  //JAVAstore croissant
            ['productid'=>5, 'sellerid'=>3],   //UNIXstore poulet
            ['productid'=>6, 'sellerid'=>2],    //WEBstore  vin rouge
            ['productid'=>1, 'sellerid'=>4],    //ALLstore  pomme1
            ['productid'=>7, 'sellerid'=>4],    //ALLstore boeuf
            ['productid'=>8, 'sellerid'=>1],   //JAVAstore  vin blanc
            ['productid'=>9, 'sellerid'=>2],    //WEBstore carotte
            ['productid'=>10, 'sellerid'=>3],   //UNIXstore pomme2
            ['productid'=>3, 'sellerid'=>3],   //UNIXstore banane
            ['productid'=>4, 'sellerid'=>3],   //UNIXstore courgette
        ];*/

        return [

            ['productid'=>1, 'sellerid'=>2],
['productid'=>2, 'sellerid'=>3],
['productid'=>3, 'sellerid'=>4],
['productid'=>4, 'sellerid'=>2],
['productid'=>5, 'sellerid'=>3],

['productid'=>6, 'sellerid'=>4],
['productid'=>7, 'sellerid'=>2],
['productid'=>8, 'sellerid'=>4],
['productid'=>9, 'sellerid'=>2],

['productid'=>10, 'sellerid'=>1],
['productid'=>11, 'sellerid'=>1],
['productid'=>12, 'sellerid'=>1],
['productid'=>13, 'sellerid'=>1],
['productid'=>14, 'sellerid'=>1],

['productid'=>15, 'sellerid'=>2],
['productid'=>16, 'sellerid'=>2],
['productid'=>17, 'sellerid'=>3],
['productid'=>18, 'sellerid'=>3],
['productid'=>19, 'sellerid'=>3],

['productid'=>20, 'sellerid'=>4],
['productid'=>21, 'sellerid'=>4],
['productid'=>22, 'sellerid'=>4],
['productid'=>23, 'sellerid'=>4],
['productid'=>24, 'sellerid'=>4],

['productid'=>25, 'sellerid'=>2],
['productid'=>26, 'sellerid'=>3],
['productid'=>27, 'sellerid'=>4],
['productid'=>28, 'sellerid'=>2],
['productid'=>29, 'sellerid'=>3],

['productid'=>30, 'sellerid'=>4],
['productid'=>31, 'sellerid'=>2],
['productid'=>32, 'sellerid'=>1],
['productid'=>33, 'sellerid'=>1],
['productid'=>34, 'sellerid'=>1],

['productid'=>35, 'sellerid'=>3],
['productid'=>36, 'sellerid'=>3],
['productid'=>37, 'sellerid'=>2],
['productid'=>38, 'sellerid'=>3],
['productid'=>39, 'sellerid'=>4]
        ];
    }
}
