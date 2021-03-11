<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrders extends Model
{
    use HasFactory;

    function detailorders()
    {
        return [
            ['orderId'=>1, 'productId'=>2, 'quantity'=>3],
            ['orderId'=>1, 'productId'=>1, 'quantity'=>2],
            ['orderId'=>2, 'productId'=>6, 'quantity'=>4],
            ['orderId'=>3, 'productId'=>3, 'quantity'=>2],
            ['orderId'=>4, 'productId'=>1, 'quantity'=>1],
            ['orderId'=>5, 'productId'=>5, 'quantity'=>4],
        ];
    }
}
