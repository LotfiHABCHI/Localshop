<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    function categories()
    {
        return [
            ['id'=>1, 'name'=>'fruits', 'description'=>NULL, 'image'=>"fruits.jpg"],
            ['id'=>2, 'name'=>'legumes', 'description'=>NULL, 'image'=>"legumes.jpg"],
            ['id'=>3, 'name'=>'boulangerie', 'description'=>NULL, 'image'=>"boulangeries.jpg"],
            ['id'=>4, 'name'=>'viandes', 'description'=>NULL, 'image'=>"viandes.jpg"],
            ['id'=>5, 'name'=>'boissons', 'description'=>NULL, 'image'=>"boissons.jpg"],
            ['id'=>6, 'name'=>'vins', 'description'=>NULL, 'image'=>"vins.jpg"],
        ];
    }
}
