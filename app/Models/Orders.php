<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    function orders()
    {
        /*return [
            ['orderid'=>1, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>23, 'customerid'=>3],
            ['orderid'=>2, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>5.50, 'customerid'=>2],
            ['orderid'=>3, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>35, 'customerid'=>1],
            ['orderid'=>4, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>24.59, 'customerid'=>2],
            ['orderid'=>5, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>15.59, 'customerid'=>3],
        ];*/

        return [
            ['orderid'=> 1, 'orderdate'=>NOW(), 'orderquantity'=>4, 'orderprice'=>75, 'customerid' => 3],
['orderid'=> 2, 'orderdate'=>NOW(), 'orderquantity'=>9, 'orderprice'=>10.8, 'customerid' => 4],
['orderid'=> 3, 'orderdate'=>NOW(), 'orderquantity'=>11, 'orderprice'=>8.8, 'customerid' => 1],
['orderid'=> 4, 'orderdate'=>NOW(), 'orderquantity'=>11, 'orderprice'=>40, 'customerid' => 1],
['orderid'=> 5, 'orderdate'=>NOW(), 'orderquantity'=>1, 'orderprice'=>5, 'customerid' => 2],
['orderid'=> 6, 'orderdate'=>NOW(), 'orderquantity'=>1, 'orderprice'=>25, 'customerid' => 2],
['orderid'=> 7, 'orderdate'=>NOW(), 'orderquantity'=>4, 'orderprice'=>8.4, 'customerid' => 3],
['orderid'=> 8, 'orderdate'=>NOW(), 'orderquantity'=>9, 'orderprice'=>21.6, 'customerid' => 4]

        ];
    }

}
