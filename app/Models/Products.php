<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    function products()
    {
        return [
            ['id' => 1, 'name' => 'Pomme', 'description'=>'golden','image'=> "pomme1.jpg", 'price' =>1.99, 'catId'=>1],
            ['id' => 2, 'name' => 'croissant',  'description'=>'sans gluten','image'=> "croissant.jpg", 'price' =>0.99, 'catId'=>3],
            ['id' => 3, 'name' => 'Banane', 'description'=>'cavendish','image'=> "banane.jpg", 'price' =>0.99, 'catId'=>1],
            ['id' => 4, 'name' => 'courgette',  'description'=>'bio','image'=> "courgette1.jpg", 'price' =>1.99, 'catId'=>2],
            ['id' => 5, 'name' => 'poulet', 'description'=>'poule elevée en plein air','image'=> "poulet.jpg", 'price' =>6.99, 'catId'=>4],
            ['id' => 6, 'name' => 'vin rouge', 'description'=>'cuvée 1987','image'=> "vinrouge.jpg", 'price' =>20.99, 'catId'=>6],
            ['id' => 7, 'name' => 'boeuf', 'description'=>'boeuf de kobé','image'=> "boeuf.jpg", 'price' =>30, 'catId'=>4],
            ['id' => 8, 'name' => 'vin blanc', 'description'=>'cuvée 1995','image'=> "vinblanc.jpg", 'price' =>16.9, 'catId'=>6],
            ['id' => 9, 'name' => 'carotte', 'description'=>'bio','image'=> "carotte.jpg", 'price' =>1.99, 'catId'=>2],
            ['id' => 10, 'name' => 'pomme', 'description'=>'bio','image'=> "pomme2.jpg", 'price' =>2.5, 'catId'=>1],

        ];
    }
}
