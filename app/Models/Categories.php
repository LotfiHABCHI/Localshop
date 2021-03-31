<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    function categories()
    {
       /* return [
            ['categoryid'=>1, 'categoryname'=>'fruits', 'categoryimage'=>"fruits2.jpg"],
            ['categoryid'=>2, 'categoryname'=>'legumes', 'categoryimage'=>"legumes.jpg"],
            ['categoryid'=>3, 'categoryname'=>'boulangerie', 'categoryimage'=>"boulangeries.jpg"],
            ['categoryid'=>4, 'categoryname'=>'viandes', 'categoryimage'=>"viandes.jpg"],
            ['categoryid'=>5, 'categoryname'=>'boissons', 'categoryimage'=>"boissons.jpg"],
            ['categoryid'=>6, 'categoryname'=>'vins', 'categoryimage'=>"vins2.jpg"],
        ];*/


       return [

        ['categoryid'=>1, 'categoryname'=>'Fruits et Légumes', 'categoryimage'=>"fruit.png"],
        ['categoryid'=>2, 'categoryname'=>'Viandes et Poissons', 'categoryimage'=>'viande.png'],
        ['categoryid'=>3, 'categoryname'=>'Boulangerie', 'categoryimage'=>'boulangerie.png'],
        ['categoryid'=>4, 'categoryname'=>'Produits laitiers', 'categoryimage'=>'laitier.png'],
        ['categoryid'=>5, 'categoryname'=>'Vins', 'categoryimage'=>'vin.png'],
        ['categoryid'=>6, 'categoryname'=>'Boissons', 'categoryimage'=>'boisson.png'],
        ['categoryid'=>7, 'categoryname'=>'Epicerie sucrée', 'categoryimage'=>'sucree.png'],
        ['categoryid'=>8, 'categoryname'=>'Epicerie salée', 'categoryimage'=>'salee.png'],
    ];
    }
}
