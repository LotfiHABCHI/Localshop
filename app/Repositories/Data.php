<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    function categories()
    {
        return [
            ['id'=>1, 'name'=>'fruits'],
            ['id'=>2, 'name'=>'legumes'],
            ['id'=>3, 'name'=>'boulangerie'],
            ['id'=>4, 'name'=>'viandes'],
            ['id'=>5, 'name'=>'boissons'],
            ['id'=>6, 'name'=>'vins'],
        ];
    }
    function products()
    {
        return [
            ['id' => 1, 'name' => 'Pomme', 'description'=>'bio','image'=> " ", 'price' =>1.99, 'catId'=>1],
            ['id' => 2, 'name' => 'croissant',  'description'=>'sans gluten','image'=> " ", 'price' =>0.99, 'catId'=>3],
            ['id' => 3, 'name' => 'Banane', 'description'=>'cavendish','image'=> " ", 'price' =>0.99, 'catId'=>1],
            ['id' => 4, 'name' => 'courgette',  'description'=>'bio','image'=> " ", 'price' =>1.99, 'catId'=>2],
            ['id' => 5, 'name' => 'poulet', 'description'=>'poule elevé en plein air','image'=> " ", 'price' =>6.99, 'catId'=>4],
            ['id' => 6, 'name' => 'vin rouge', 'description'=>'cuvée 1987','image'=> " ", 'price' =>20.99, 'catId'=>6],
        ];
    }

    function customers()
    {
        return [
            ['id'=>1, 'lastname'=>'Yahiaoui', 'firstname'=>'Nahida', 'email'=>'nahida@gmail.com', "password"=>" ","numstreet"=>71, "namestreet"=>"avenue de luminy", "CP"=>13009],
            ['id'=>2, 'lastname'=>'Scherelle', 'firstname'=>'Celia', 'email'=>'celia@gmail.com', "password"=>" ","numstreet"=>45, "namestreet"=>"rue de poitou", "CP"=>13012],
            ['id'=>3, 'lastname'=>'Zenagui', 'firstname'=>'Mohcine', 'email'=>'mohcine@gmail.com', "password"=>" ","numstreet"=>112, "namestreet"=>"avenue des capucines", "CP"=>13004],
            ['id'=>4, 'lastname'=>'Habchi', 'firstname'=>'Lotfi', 'email'=>'lotfi@gmail.com', "password"=>" ","numstreet"=>6, "namestreet"=>"boulevard magenta", "CP"=>13009],
        ];
    }

    function sellers()
    {
        return [
            ['id'=>1, 'lastname'=>'Nouioua', 'firstname'=>'Karim', 'email'=>'karim@gmail.com', "password"=>" ","numstreet"=>12, "namestreet"=>"avenue de luminy", "CP"=>13009, 'tel'=>'0660504080',"storename"=>"JAVAstore", 'siren'=>1213141312],
            ['id'=>2, 'lastname'=>'Estellon', 'firstname'=>'Bertrand', 'email'=>'bertrand@gmail.com', "password"=>" ","numstreet"=>71, "namestreet"=>"rue de lagny", "CP"=>13002, 'tel'=>'0630504070',"storename"=>"WEBstore", 'siren'=>0102030405],
            ['id'=>3, 'lastname'=>'Mari', 'firstname'=>'Jean', 'email'=>'jean@gmail.com', "password"=>" ","numstreet"=>135, "namestreet"=>"avenue des godeaux", "CP"=>13010, 'tel'=>'0656435897',"storename"=>"UNIXstore", 'siren'=>7475767778],
            ['id'=>4, 'lastname'=>'Beguet', 'firstname'=>'Florian', 'email'=>'florian@gmail.com', "password"=>" ","numstreet"=>81, "namestreet"=>"avenue des champs", "CP"=>13012, 'tel'=>'0658748596',"storename"=>"ALLstore", 'siren'=>1213141516],
        ];
    }

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

    function product_details()
    {
        return [
            ['prodId'=>2, 'sellerId'=>1, 'prodStock'=>45],
            ['prodId'=>5, 'sellerId'=>3, 'prodStock'=>12],
            ['prodId'=>2, 'sellerId'=>4, 'prodStock'=>5],
            ['prodId'=>6, 'sellerId'=>2, 'prodStock'=>1],
            ['prodId'=>1, 'sellerId'=>4, 'prodStock'=>25],
        ];
    }

    function orders()
    {
        return [
            ['orderId'=>1, 'customerId'=>3, 'orderPrice'=>23, 'orderDate'=>timestamp()],
            ['orderId'=>2, 'customerId'=>2, 'orderPrice'=>5.50, 'orderDate'=>timestamp()],
            ['orderId'=>3, 'customerId'=>1, 'orderPrice'=>35, 'orderDate'=>timestamp()],
            ['orderId'=>4, 'customerId'=>2, 'orderPrice'=>24.59, 'orderDate'=>timestamp()],
        ];
    }

    function order_details()
    {
        return [
            ['orderId'=>1, 'prodId'=>2, 'quantity'=>3],
            ['orderId'=>1, 'prodId'=>1, 'quantity'=>2],
            ['orderId'=>2, 'prodId'=>6, 'quantity'=>4],
            ['orderId'=>3, 'prodId'=>3, 'quantity'=>2],
            ['orderId'=>4, 'prodId'=>1, 'quantity'=>1],
        ];
    }
}
