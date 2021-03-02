<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    function orders()
    {
        return [
            ['id'=>1, 'customerId'=>3, 'price'=>23, 'orderDate'=>NOW()],
            ['id'=>2, 'customerId'=>2, 'price'=>5.50, 'orderDate'=>NOW()],
            ['id'=>3, 'customerId'=>1, 'price'=>35, 'orderDate'=>NOW()],
            ['id'=>4, 'customerId'=>2, 'price'=>24.59, 'orderDate'=>NOW()],
        ];
    }

}
