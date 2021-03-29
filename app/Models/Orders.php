<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    function orders()
    {//le prix ne devrait pas etre dans la bd je pense ou alors il faut le calculer!!
        return [
            ['orderid'=>1, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>23, 'customerid'=>3],
            ['orderid'=>2, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>5.50, 'customerid'=>2],
            ['orderid'=>3, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>35, 'customerid'=>1],
            ['orderid'=>4, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>24.59, 'customerid'=>2],
            ['orderid'=>5, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>15.59, 'customerid'=>3],
        ];

        /*return [
            ['id'=>1, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>23, 'customerid'=>3,],
            ['id'=>2, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>5.50, 'customerid'=>2,],
            ['id'=>3, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>35, 'customerid'=>1,],
            ['id'=>4, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>24.59, 'customerid'=>2,],
            ['id'=>5, 'orderdate'=>NOW(), 'orderquantity'=>3, 'orderprice'=>15.59, 'customerid'=>3,],
        ];*/
    }

}
