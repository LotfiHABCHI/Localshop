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
            ['cp'=>13009, 'city'=>'luminy'],
            ['cp'=>13004, 'city'=>'castellane'],
            ['cp'=>13008, 'city'=>'redon'],
            ['cp'=>13001, 'city'=>'Saint charles'],
            ['cp'=>13002, 'city'=>'deux'],
            ['cp'=>13010, 'city'=>'dix'],
            ['cp'=>13012, 'city'=>'douze'],
        ];
    }
}
