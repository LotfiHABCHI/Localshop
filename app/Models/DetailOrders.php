<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrders extends Model
{
    use HasFactory;

    function detailorders()
    {
       /* return [
            ['orderid'=>1, 'productid'=>2, 'orderproductquantity'=>3, "status"=>1],
            ['orderid'=>1, 'productid'=>1, 'orderproductquantity'=>2, "status"=>1],
            ['orderid'=>2, 'productid'=>6, 'orderproductquantity'=>4, "status"=>1],
            ['orderid'=>3, 'productid'=>3, 'orderproductquantity'=>2, "status"=>1],
            ['orderid'=>4, 'productid'=>1, 'orderproductquantity'=>1, "status"=>1],
            ['orderid'=>5, 'productid'=>5, 'orderproductquantity'=>4, "status"=>1],
        ];*/

        return [
            ['orderid'=> 1, 'productid'=>19, 'orderproductquantity'=>1, 'status'=>1],
            ['orderid'=> 1, 'productid'=>20, 'orderproductquantity'=>1, 'status'=>1],
            ['orderid'=> 1, 'productid'=>21, 'orderproductquantity'=>1, 'status'=>1],
            ['orderid'=> 1, 'productid'=>22, 'orderproductquantity'=>1, 'status'=>1],

            ['orderid'=> 2, 'productid'=>12, 'orderproductquantity'=>9, 'status'=>1],

            ['orderid'=> 3, 'productid'=>10, 'orderproductquantity'=>11, 'status'=>1],

            ['orderid'=> 4, 'productid'=>6, 'orderproductquantity'=>5, 'status'=>1],
            ['orderid'=> 4, 'productid'=>4, 'orderproductquantity'=>5, 'status'=>1],
            ['orderid'=> 4, 'productid'=>23, 'orderproductquantity'=>1, 'status'=>1],

            ['orderid'=> 5, 'productid'=>16, 'orderproductquantity'=>1, 'status'=>1],

            ['orderid'=> 6, 'productid'=>23, 'orderproductquantity'=>1, 'status'=>1],

            ['orderid'=> 7, 'productid'=>35, 'orderproductquantity'=>1, 'status'=>1],
            ['orderid'=> 7, 'productid'=>36, 'orderproductquantity'=>1, 'status'=>1],
            ['orderid'=> 7, 'productid'=>13, 'orderproductquantity'=>2, 'status'=>1],


            ['orderid'=> 8, 'productid'=>25, 'orderproductquantity'=>2, 'status'=>1],
            ['orderid'=> 8, 'productid'=>26, 'orderproductquantity'=>2, 'status'=>1],
            ['orderid'=> 8, 'productid'=>27, 'orderproductquantity'=>2, 'status'=>1],
            ['orderid'=> 8, 'productid'=>31, 'orderproductquantity'=>3, 'status'=>1]
        ];
    }
}
