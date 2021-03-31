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
            ['cp'=>13001, 'city'=>'marseille'],
            ['cp'=>13002, 'city'=>'marseille'],
            ['cp'=>13003, 'city'=>'marseille'],
            ['cp'=>13004, 'city'=>'marseille'],
            ['cp'=>13005, 'city'=>'marseille'],
            ['cp'=>13006, 'city'=>'marseille'],
            ['cp'=>13007, 'city'=>'marseille'],
            ['cp'=>13008, 'city'=>'marseille'],
            
        ];
    }
}
