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
            ['id'=>1, 'name'=>'fruits', 'image'=>"fruits2.jpg"],
            ['id'=>2, 'name'=>'legumes', 'image'=>"legumes.jpg"],
            ['id'=>3, 'name'=>'boulangerie', 'image'=>"boulangeries.jpg"],
            ['id'=>4, 'name'=>'viandes', 'image'=>"viandes.jpg"],
            ['id'=>5, 'name'=>'boissons', 'image'=>"boissons.jpg"],
            ['id'=>6, 'name'=>'vins', 'image'=>"vins2.jpg"],
        ];
    }
}
