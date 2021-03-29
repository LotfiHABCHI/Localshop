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
            ['orderid'=>1, 'productid'=>2, 'orderproductquantity'=>3, "status"=>1],
            ['orderid'=>1, 'productid'=>1, 'orderproductquantity'=>2, "status"=>1],
            ['orderid'=>2, 'productid'=>6, 'orderproductquantity'=>4, "status"=>1],
            ['orderid'=>3, 'productid'=>3, 'orderproductquantity'=>2, "status"=>1],
            ['orderid'=>4, 'productid'=>1, 'orderproductquantity'=>1, "status"=>1],
            ['orderid'=>5, 'productid'=>5, 'orderproductquantity'=>4, "status"=>1],
        ];
    }
}
