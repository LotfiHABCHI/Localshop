<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Data;
use App\Models\Categories;
use App\Models\Products;
use App\Models\PostCodes;
use App\Models\Sellers;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\DetailOrders;
use App\Models\DetailProducts;


class Repository
{

    function insertCategory(array $category): int
    {
        return DB::table('categories')->insertGetId($category);
    
    }


    function insertProduct(array $product): int
    {
        return DB::table('products')->insertGetId($product);
    
    }

    function insertPostCode(array $postcode): int
    {
        return DB::table('postcodes')->insertGetId($postcode);
    
    }

    function insertSeller(array $seller): int
    {
        return DB::table('sellers')->insertGetId($seller);
    
    }

    function insertCustomer(array $customer): int
    {
        return DB::table('customers')->insertGetId($customer);
    
    }

    function insertOrder(array $order): int
    {
        return DB::table('orders')->insertGetId($order);
    
    }

    /*function insertDetail_Order(array $detail_order): int
    {
        return DB::table('order_details')->insertGetId($detail_order);
    
    }*/

    function insertDetail_Product(array $detail_product): int
    {
        return DB::table('detail_products')->insertGetId($detail_product);
    
    }



    function insertDetail_Order(array $detail_order): int
    {
        return DB::table('detail_orders')->insertGetId($detail_order);
    
    }


    function fillDatabase(): void
    {
        
        $data = new Categories();
        $categories=$data->categories();


        foreach($categories as $category){
            $this->insertCategory($category);
        }
        

        $data = new Products();
        $products=$data->products();

        foreach($products as $product){
            $this->insertProduct($product);
        }


        $data = new PostCodes();
        $postcodes=$data->postCodes();

        foreach($postcodes as $postcode){
            $this->insertPostCode($postcode);
        }
        
        $data = new Sellers();
        $sellers=$data->sellers();

        foreach($sellers as $seller){
            $this->insertSeller($seller);
        }

        $data = new Customers();
        $customers=$data->customers();

        foreach($customers as $customer){
            $this->insertCustomer($customer);
        }

        $data = new Orders();
        $orders=$data->orders();

        foreach($orders as $order){
            $this->insertOrder($order);
        }

        $data = new DetailOrders();
        $detail_orders=$data->detailorders();

        foreach($detail_orders as $detail){
            $this->insertDetail_Order($detail);
        }


        $data = new DetailProducts();
        $detail_products=$data->detailProducts();

        foreach($detail_products as $detail_product){
            $this->insertDetail_Product($detail_product);
        }
    }

    function productsOfCategory($id) : array
    {
        $prods = DB::table('products')->join('categories as cat', 'cat.id', '=', 'products.catId')
                        ->where('cat.id', $id)
                              ->get(['cat.name as namecat', 'products.name as prodname', 'products.price as prodprice'])
                               ->toArray();
        return $prods;
    }


    function productsOfSeller($id) : array
    {
        $prods = DB::table('detail_products as d')
        ->join('sellers as s','s.id', 'd.sellerId')
        ->join('products as p', 'p.id', 'd.productId')
        ->where('s.id',$id)
        ->select('s.storename', 'p.*', 'd.*')
        ->get()
        ->toArray();
        return $prods;
    }

    function productInfos() : array
    {
        //Affiche les infos des produits
        //SELECT sellers.storename, products.*
        //FROM ((sellers s JOIN detail_products d ON s.id=d.sellerId)
        //JOIN products p ON p.id=d.productId)
        

        $prods = DB::table('detail_products as d')
        ->join('sellers as s','s.id', 'd.sellerId')
        ->join('products as p', 'p.id', 'd.productId')
        
        ->select('s.storename as store','s.id as sellerId', 'p.*', 'd.stock')
        ->get()
        ->toArray();
        return $prods;
    }

   
}
