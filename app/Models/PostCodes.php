<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCodes extends Model
{
    use HasFactory;

    function postCodes()
    {
        return [
            ['CP'=>13009, 'city'=>'luminy'],
            ['CP'=>13004, 'city'=>'castellane'],
            ['CP'=>13008, 'city'=>'redon'],
            ['CP'=>13001, 'city'=>'Saint charles'],
            ['CP'=>13002, 'city'=>'deux'],
            ['CP'=>13010, 'city'=>'dix'],
            ['CP'=>13012, 'city'=>'douze'],
        ];
    }
}
