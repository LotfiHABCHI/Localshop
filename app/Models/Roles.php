<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

   function roles(){
        return [
            ['roleid'=>1, 'rolename'=>'seller'],
            ['roleid'=>2, 'rolename'=>'customer'],
        ];
    }
}
