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
    //
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
        ->where('s.id', $id)
        ->select('s.storename', 'p.*', 'p.id as id', 'd.*')
        ->get()
        ->toArray();
        return $prods;

        /*$prods = DB::table('sellers as s')
        ->join('people as p', 'p.sellerId', 's.id')
        ->where('s.id', $id)
        ->select('s.*')
        ->get()
        ->toArray();
        return $prods;*/

    }

    public function connectValide($email)
    {
        $customer=DB::table('customers')->where('email',$email)->get()->toArray();
        $seller=DB::table('sellers')->where('email',$email)->get()->toArray();

        if($email!=$customer['email']){
            return redirect()->back()->withInput()->withErrors("email inexistant."); 
        }
        else if($email!=$seller['email']){
            return redirect()->back()->withInput()->withErrors("email inexistant."); 
        }

    }

    function detailProductsOfCategory($id) : array
    {
        $prods = DB::table('detail_products as d')
        ->join('sellers as s','s.id', 'd.sellerId')
        ->join('products as p', 'p.id', 'd.productId')
        ->where('p.catId',$id)
        ->select('s.storename as store', 'p.*', 'd.*')
        ->get()
        ->toArray();
        return $prods;
    }

    function productCount($id) : int
    {
        $count=0;
        $count = DB::table('detail_products as d')
        ->where('sellerId',$id)
        ->select('productId')
        ->get()
        ->count();

        return $count;
    }

    function product($id) : array
    {
        $product = DB::table('detail_products as d')
        ->join('sellers as s','s.id', 'd.sellerId')
        ->join('products as p', 'p.id', 'd.productId')
        ->where('p.id',$id)
        ->select('s.storename as store','s.id as sellerId', 'p.*', 'd.stock', 'p.catId as catId')
        ->get()
        ->toArray();
        return $product;
    }


    function productInfos() : array
    { //Affiche les infos des produits
        
        //SELECT sellers.storename, products.*
        //FROM ((sellers s JOIN detail_products d ON s.id=d.sellerId)
        //JOIN products p ON p.id=d.productId)
        

        $prods = DB::table('detail_products as d')
        ->join('sellers as s','s.id', 'd.sellerId')
        ->join('products as p', 'p.id', 'd.productId')
        ->select('s.storename as store','s.id as sellerId', 'p.*', 'd.stock')
        ->orderBy('p.price')
        ->get()
        ->toArray();
        return $prods;
    }

    function ordersOfCustomer($id) : array
    { //Affiche toutes les commandes (et leurs détails) passées par un client id=

        $orders = DB::table('customers as c')
        ->join('orders as o','o.customerId', 'c.id')
        ->join('detail_orders as d', 'd.OrderId', 'o.id')
        ->where('c.id',$id)
        ->select('c.*', 'o.*', 'd.*')
        ->get()
        ->toArray();
       
        return $orders;


        //Affiche les details de la commande id=
        /*$orders = DB::table('detail_orders as d')
        ->join('orders as o','o.id', 'd.orderId')
        ->join('customers as c', 'c.id', 'o.customerId')
        ->where('d.orderId',$id)
        ->select('c.*', 'o.*', 'd.*')
        ->get()
        ->toArray();
        return $orders;*/


        //Affiche les commandes (sans détailler les produits achetés) du client id=
        /*$orders = DB::table('customers as c')
        ->join('orders as o','o.customerId', 'c.id')
        ->where('c.id',$id)
        ->select('c.*', 'o.id as oid', 'o.*')
        ->get()
        ->toArray();
        return $orders;*/
    }


    




    /* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ juste un copier coller du web_cci pour l'instant ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */




    function addSeller(string $lastname, string $firstname, string $email, string $phone, string $password, int $numstreet, string $namestreet, int $postcode, string $city, string $storename, int $siret)/*: int*/
    {
        $role=2;
        $passwordHash = Hash::make($password);
        $sellerId=DB::table('sellers')->insertGetId(["lastname"=>$lastname, 'firstname'=>$firstname, 'email'=>$email, "phone"=>$phone, 'password'=> $passwordHash, "numstreet"=>$numstreet, "namestreet"=>$namestreet, "postcode"=>$postcode, "city"=>$city, "storename"=>$storename, "siret"=>$siret]);
        DB::table('people')->insert(["lastname"=>$lastname, 'firstname'=>$firstname, 'email'=>$email, 'password'=> $passwordHash,"sellerId"=>$sellerId, 'role'=>$role]);

        //return DB::table('sellers')->insert(["lastname"=>$lastname, 'firstname'=>$firstname, 'email'=>$email, "phone"=>$phone, 'password'=> $passwordHash, "numstreet"=>$numstreet, "namestreet"=>$namestreet, "postcode"=>$postcode, "city"=>$city, "storename"=>$storename, "siret"=>$siret]);
    }


    function getSeller(string $email, string $password): array
    {
    // TODO
    //$customers= DB::table('customers')->where('email', $email)->get()->toArray();

    $sellers= DB::table('sellers')->where('email', $email)->get()->toArray();
                        //customers pour loguer les customers
    if (count($sellers)==0){
        throw new Exception('Utilisateur inconnu');
    }
    $seller=$sellers[0];
   
    $ok = Hash::check($password, $seller->password);

        if (!$ok){
            throw new Exception('Utilisateur inconnu');
        }
    return ['id'=>$seller->id,'email'=>$seller->email];
    }



    function addCustomer(string $lastname, string $firstname, string $email, string $password, int $numstreet, string $namestreet, int $postcode, string $city)/*: int*/
    {
      //  $role=DB::table('roles')->where('rolename', '=', 'customer');
        $role=1;
        $passwordHash = Hash::make($password);
        $customerId=DB::table('customers')->insertGetId(["lastname"=>$lastname, 'firstname'=>$firstname, 'email'=>$email, 'password'=> $passwordHash, "numstreet"=>$numstreet, "namestreet"=>$namestreet, "postcode"=>$postcode, "city"=>$city]);

        DB::table('people')->insert(["lastname"=>$lastname, 'firstname'=>$firstname, 'email'=>$email, 'password'=> $passwordHash,"customerId"=>$customerId, 'role'=>$role]);

       // return DB::table('customers')->insert(["lastname"=>$lastname, 'firstname'=>$firstname, 'email'=>$email, 'password'=> $passwordHash, "numstreet"=>$numstreet, "namestreet"=>$namestreet, "postcode"=>$postcode, "city"=>$city]);
    }


    function getCustomer(string $email, string $password): array
    {
    // TODO
    //$customers= DB::table('customers')->where('email', $email)->get()->toArray();

    $customers= DB::table('customers')->where('email', $email)->get()->toArray();
                        //customers pour loguer les customers
    if (count($customers)==0){
        throw new Exception('Utilisateur inconnu');
    }
    $customer=$customers[0];
   
    $ok = Hash::check($password, $customer->password);

        if (!$ok){
            throw new Exception('Utilisateur inconnu');
        }
    return ['id'=>$customer->id,'email'=>$customer->email];
    }


    function getPeople(string $email, string $password): array
    {
    // TODO
    //$customers= DB::table('customers')->where('email', $email)->get()->toArray();

    $peoples= DB::table('people')->where('email', $email)->get()->toArray();
                        //customers pour loguer les customers
    if (count($peoples)==0){
        throw new Exception('Utilisateur inconnu');
    }
    $people=$peoples[0];

   
    $ok = Hash::check($password, $people->password);

        if (!$ok){
            throw new Exception('Utilisateur inconnu');
        }
    return ['id'=>$people->id, 'email'=>$people->email,'firstname'=>$people->firstname, 'role'=>$people->role, 'sellerId'=>$people->sellerId];
    }
   


    

    function changePassword(string $email, string $oldPassword, string $newPassword): void 
    {
    // TODO

      //verifier si le mot de passe est correct:

      $people= DB::table('people')->where('email', $email)->get()->toArray();

      if(count($people)==0){
        throw new Exception('Utilisateur inconnu');
      }


      $ok = Hash::check($oldPassword, $people[0]->password);
      if (!$ok){
        throw new Exception('Utilisateur inconnu');
      }
      
      $newPasswordHash = Hash::make($newPassword);
      DB::table('people')->where('email', $email)->update(['password'=> $newPasswordHash]);
    }


    function addProduct(string $name, string $description, string $image, float $price, int $category ) : int
    {
        
        return DB::table('products')->insertGetId(['name'=> $name, 'description'=> $description, 'image'=> $image,'price'=> $price, 'catId'=> $category]);    

    }

    function addDetailProduct(int $productId, int $sellerId, int $stock) : int
    {
        
        return DB::table('detail_products')->insert(['productId'=> $productId, 'sellerId'=> $sellerId, 'stock'=> $stock]);    

    }

    function resetPassword(string $email, string $newPassword): void 
    {
    
      $people= DB::table('people')->where('email', $email)->get()->toArray();

      if(count($people)==0){
        throw new Exception('Utilisateur inconnu');
      }

            
      $newPasswordHash = Hash::make($newPassword);
      DB::table('people')->where('email', $email)->update(['password'=> $newPasswordHash]);
    }

    function sendEmail(){
        
    }

    


    


    /*function getCustomer(string $email, string $password): array
    {
    // TODO
    $users= DB::table('users')->where('email', $email)->get()->toArray();

    $sellers= DB::table('sellers')->where('email', $email)->union($users)->get()->toArray();

    if (count($sellers)==0){
        throw new Exception('Utilisateur inconnu');
    }
    $seller=$sellers[0];
   
    $ok = Hash::check($password, $seller->password);

        if (!$ok){
            throw new Exception('Utilisateur inconnu');
        }
    return ['id'=>$seller->id,'email'=>$seller->email,];
    }*/
   
}
