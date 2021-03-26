<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    function products()
    {
        /*return [
            ['id' => 1, 'name' => 'Pomme', 'description'=>'golden','image'=> "pomme1.jpg", 'price' =>1.99, 'catId'=>1, 'stock'=>50],
            ['id' => 2, 'name' => 'croissant',  'description'=>'sans gluten','image'=> "croissant.jpg", 'price' =>0.99, 'catId'=>3, 'stock'=>50],
            ['id' => 3, 'name' => 'Banane', 'description'=>'cavendish','image'=> "banane.jpg", 'price' =>0.99, 'catId'=>1, 'stock'=>50],
            ['id' => 4, 'name' => 'courgette',  'description'=>'bio','image'=> "courgette1.jpg", 'price' =>1.99, 'catId'=>2, 'stock'=>50],
            ['id' => 5, 'name' => 'poulet', 'description'=>'poule elevée en plein air','image'=> "poulet.jpg", 'price' =>6.99, 'catId'=>4, 'stock'=>50],
            ['id' => 6, 'name' => 'vin rouge', 'description'=>'cuvée 1987','image'=> "vinrouge.jpg", 'price' =>20.99, 'catId'=>6, 'stock'=>50],
            ['id' => 7, 'name' => 'boeuf', 'description'=>'boeuf de kobé','image'=> "boeuf.jpg", 'price' =>30, 'catId'=>4, 'stock'=>50],
            ['id' => 8, 'name' => 'vin blanc', 'description'=>'cuvée 1995','image'=> "vinblanc.jpg", 'price' =>16.9, 'catId'=>6, 'stock'=>50],
            ['id' => 9, 'name' => 'carotte', 'description'=>'bio','image'=> "carotte.jpg", 'price' =>1.99, 'catId'=>2, 'stock'=>50],
            ['id' => 10, 'name' => 'pomme', 'description'=>'bio','image'=> "pomme2.jpg", 'price' =>2.5, 'catId'=>1, 'stock'=>50],

        ];*/


        return [
            ['productid' => 1, 'productname' => 'Pomme', 'productimage'=> "pomme1.jpg", 'productinfo'=>'golden', 'productprice' =>1.99, 'categoryid'=>1, 'productquantity'=>50],
            ['productid' => 2, 'productname' => 'croissant', 'productimage'=> "croissant.jpg",  'productinfo'=>'sans gluten', 'productprice' =>0.99, 'categoryid'=>3, 'productquantity'=>50],
            ['productid' => 3, 'productname' => 'Banane', 'productimage'=> "banane.jpg", 'productinfo'=>'cavendish', 'productprice' =>0.99, 'categoryid'=>1, 'productquantity'=>50],
            ['productid' => 4, 'productname' => 'courgette', 'productimage'=> "courgette1.jpg",  'productinfo'=>'bio', 'productprice' =>1.99, 'categoryid'=>2, 'productquantity'=>50],
            ['productid' => 5, 'productname' => 'poulet', 'productimage'=> "poulet.jpg", 'productinfo'=>'poule elevée en plein air', 'productprice' =>6.99, 'categoryid'=>4, 'productquantity'=>50],
            ['productid' => 6, 'productname' => 'vin rouge', 'productimage'=> "vinrouge.jpg", 'productinfo'=>'cuvée 1987', 'productprice' =>20.99, 'categoryid'=>6, 'productquantity'=>50],
            ['productid' => 7, 'productname' => 'boeuf', 'productimage'=> "boeuf.jpg", 'productinfo'=>'boeuf de kobé', 'productprice' =>30, 'categoryid'=>4, 'productquantity'=>50],
            ['productid' => 8, 'productname' => 'vin blanc', 'productimage'=> "vinblanc.jpg", 'productinfo'=>'cuvée 1995', 'productprice' =>16.9, 'categoryid'=>6, 'productquantity'=>50],
            ['productid' => 9, 'productname' => 'carotte', 'productimage'=> "carotte.jpg", 'productinfo'=>'bio', 'productprice' =>1.99, 'categoryid'=>2, 'productquantity'=>50],
            ['productid' => 10, 'productname' => 'pomme', 'productimage'=> "pomme2.jpg", 'productinfo'=>'bio', 'productprice' =>2.5, 'categoryid'=>1, 'productquantity'=>50],

        ];
    }
}
