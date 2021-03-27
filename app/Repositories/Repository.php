<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use dateTime;


use App\Models\Data;
use App\Models\Categories;
use App\Models\Products;
use App\Models\PostCodes;
use App\Models\Sellers;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\DetailOrders;
use App\Models\DetailProducts;
use App\Models\Roles;



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

    function insertAlluser(array $alluser): int
    {
        return DB::table('allusers')->insertGetId($alluser);
    
    }

    function insertRole(array $role): int
    {
        return DB::table('roles')->insertGetId($role);
    
    }

    function insertAdmin(array $admin): int
    {
        return DB::table('admins')->insertGetId($admin);
    
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

        /*$data = new AllUsers();
        $allusers=$data->allUsers();

        foreach($allusers as $alluser){
            $this->insertAlluser($alluser);
        }*/

        $data = new Roles();
        $roles=$data->roles();

        foreach($roles as $role){
            $this->insertRole($role);
        }

        /*$data = new Admins();
        $admins=$data->admins();

        foreach($admins as $admin){
            $this->insertAdmin($admin);
        }*/
    }

    function productsOfCategory($id) : array
    //
   /* {
        $prods = DB::table('products')->join('categories as cat', 'cat.id', '=', 'products.catId')
                        ->where('cat.id', $id)
                              ->get(['cat.name as namecat', 'products.name as prodname', 'products.price as prodprice'])
                               ->toArray();
        return $prods;
    }*/

    {
        $prods = DB::table('products')->join('categories as cat', 'cat.categoryid', '=', 'products.categoryid')
                        ->where('cat.categoryid', $id)
                              ->get(['cat.*', 'products.*'])
                               ->toArray();
        return $prods;
    }


    /*function productsOfSeller($id) : array
    { 

       $prods = DB::table('detail_products as d')
        ->join('sellers as s','s.id', 'd.sellerId')
        ->join('products as p', 'p.id', 'd.productId')
        ->where('s.id', $id)
        ->get()
        ->toArray();
        return $prods;
    }*/

        /*$prods = DB::table('sellers as s')
        ->join('people as p', 'p.sellerId', 's.id')
        ->where('s.id', $id)
        ->select('s.*')
        ->get()
        ->toArray();
        return $prods;*/

    function productsOfSeller($id) : array
    {
       $prods = DB::table('detail_products as d')
        ->join('sellers as s','s.sellerid', 'd.sellerid')
        ->join('products as p', 'p.productid', 'd.productid')
        ->where('s.sellerid', $id)
        ->get()
        ->toArray();
        return $prods;
    }
    
    

    /*public function connectValide($email)
    {
        $customer=DB::table('customers')->where('email',$email)->get()->toArray();
        $seller=DB::table('sellers')->where('email',$email)->get()->toArray();

        if($email!=$customer['email']){
            return redirect()->back()->withInput()->withErrors("email inexistant."); 
        }
        else if($email!=$seller['email']){
            return redirect()->back()->withInput()->withErrors("email inexistant."); 
        }

    }*/

    function detailProductsOfCategory($id) : array
    {
        $prods = DB::table('detail_products as d')
        ->join('sellers as s','s.sellerid', 'd.sellerid')
        ->join('products as p', 'p.productid', 'd.productid')
        ->where('p.categoryid',$id)
        ->select('s.*' /*storename as store'*/, 'p.*', 'd.*')
        ->get()
        ->toArray();
        return $prods;
    }

    function productCount($id) : int
    {
        $count=0;
        $count = DB::table('detail_products as d')
        ->where('sellerid',$id)
        ->select('productid')
        ->get()
        ->count();

        return $count;
    }

    function product($id) : array
    {
        $product = DB::table('detail_products as d')
        ->join('sellers as s','s.sellerid', 'd.sellerid')
        ->join('products as p', 'p.productid', 'd.productid')
        ->where('p.productid',$id)
        ->select('s.*', 'p.*')
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
        ->join('sellers as s','s.sellerid', 'd.sellerid')
        ->join('products as p', 'p.productid', 'd.productid')
        ->join('categories as c', 'c.categoryid', 'p.categoryid')
        ->select('s.storename as store','s.sellerid as sellerId', 'p.*', /*'d.stock'*/ 'p.productquantity', 'c.categoryname as category')
       // ->orderBy('productprice')
        ->get()
        ->toArray();
        return $prods;
    }
    

    function ordersOfCustomer($id) : array
    { //Affiche toutes les commandes (et leurs détails) passées par un client id=

        $orders = DB::table('customers as c')        
        ->join('orders as o','o.customerid', 'c.customerid')
        ->join('detail_orders as d', 'd.orderid', 'o.orderid')
        ->join('products as p', 'p.productid', 'd.productid')
        ->join('detail_products as dp', 'dp.productid', 'p.productid')
        ->join('sellers as s', 's.sellerid', 'dp.sellerid' )
        ->where('c.customerid',$id)
        ->groupBy('o.orderid',  'o.orderprice', 'o.orderdate')
        ->select('o.*')
        ->get()
        ->toArray();

        /*$orders = DB::table('customers as c')        
        ->join('orders as o','o.customerid', 'c.customerid')
        ->join('detail_orders as d', 'd.orderid', 'o.id')
        ->join('products as p', 'p.productid', 'd.productid')
        ->join('detail_products as dp', 'dp.productid', 'p.productid')
        ->join('sellers as s', 's.sellerid', 'dp.sellerid' )
        ->where('c.customerid',$id)
        ->groupBy('o.id',  'o.orderprice', 'o.orderdate')
        ->select('o.*')
        ->get()
        ->toArray();*/

       
        return $orders;

        /*$orders = DB::table('customers as c')        
        ->join('orders as o','o.customerId', 'c.id')
        ->join('detail_orders as d', 'd.OrderId', 'o.id')
        ->join('products as p', 'p.id', 'd.productId')
        ->join('detail_products as dp', 'dp.productId', 'p.id')
        ->join('sellers as s', 's.id', 'dp.sellerId' )
        ->where('c.id',$id)
        ->groupBy('o.id',  'o.price', 'o.orderDate')
        ->select('o.id', 'o.price', 'd.orderId',  'o.price as oprice', 'o.orderDate')
        ->get()
        ->toArray();
       
        return $orders;*/
    }

    function detailOrder($id) : array
    {
        //Affiche les details de la commande id=
        /*$orders = DB::table('detail_orders as d')
        ->join('orders as o','o.id', 'd.orderId')
        ->join('customers as c', 'c.id', 'o.customerId')
        ->join('products as p', 'p.id', 'd.productId')
        ->join('detail_products as dp', 'dp.productId', 'p.id')
        ->join('sellers as s', 's.id', 'dp.sellerId')
        ->where('d.orderId',$id)
        ->select('c.*', 'o.*', 'd.*', 'p.*', 's.storename')
        ->get()
        ->toArray();
        return $orders;*/

        $orders = DB::table('detail_orders as d')
        ->join('orders as o','o.orderid', 'd.orderid')
        ->join('customers as c', 'c.customerid', 'o.customerid')
        ->join('products as p', 'p.productid', 'd.productid')
        ->join('detail_products as dp', 'dp.productid', 'p.productid')
        ->join('sellers as s', 's.sellerid', 'dp.sellerid')
        ->where('d.orderid',$id)
        ->select('c.*', 'o.*', 'd.*', 'p.*', 's.*')
        ->get()
        ->toArray();
        return $orders;
    }

        //Affiche les commandes (sans détailler les produits achetés) du client id=
        /*$orders = DB::table('customers as c')
        ->join('orders as o','o.customerId', 'c.id')
        ->where('c.id',$id)
        ->select('c.*', 'o.id as oid', 'o.*')
        ->get()
        ->toArray();
        return $orders;*/
    


    




    /* ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ juste un copier coller du web_cci pour l'instant ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ */

    public function getRole($rolename) : array
    {
      return $role=DB::table('roles')->where('rolename', $rolename)->select('roleid')->get()->toArray();
    }


    function addSeller(string $firstname, string $lastname, string $email, string $password, string $phone,  int $siret, int $numstreet, string $namestreet, int $cp, string $city, string $storename,string $image, string $description )/*: int*/
    {
        $role=$this->getRole('seller')[0]->roleid;
       
        //$role=$roles[0]->roleid;
        $passwordHash = Hash::make($password);

        $sellerId=DB::table('sellers')->insertGetId(['sellerfirstname'=>$firstname,
                                                     "sellerlastname"=>$lastname,
                                                      'selleremail'=>$email,
                                                      'password'=> $passwordHash,
                                                       "sellerphone"=>$phone,
                                                       "siret"=>$siret,
                                                         "sellernumstreet"=>$numstreet,
                                                          "sellernamestreet"=>$namestreet,
                                                           "cp"=>$cp,
                                                            "city"=>$city,
                                                             "storename"=>$storename,
                                                             "sellerimage"=>$image,
                                                             "sellerdescription"=>$description
                                                              ]);

        DB::table('allusers')->insert([ 'alluserfirstname'=>$firstname, 'alluseremail'=>$email, 'password'=> $passwordHash,"allusersellerid"=>$sellerId, 'roleid'=>$role]);

        //return DB::table('sellers')->insert(["lastname"=>$lastname, 'firstname'=>$firstname, 'email'=>$email, "phone"=>$phone, 'password'=> $passwordHash, "numstreet"=>$numstreet, "namestreet"=>$namestreet, "postcode"=>$postcode, "city"=>$city, "storename"=>$storename, "siret"=>$siret]);
    }


    function getSeller(string $email, string $password): array
    {
    // TODO
    //$customers= DB::table('customers')->where('email', $email)->get()->toArray();

    $sellers= DB::table('sellers')->where('selleremail', $email)->get()->toArray();
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


    function addCustomer(string $firstname, string $lastname, string $email, string $password, string $phone, int $numstreet, string $namestreet, int $cp, string $city)/*: int*/
    {
      
        $roles=$this->getRole('customer');
        $role=$roles[0]->roleid;

        
        $passwordHash = Hash::make($password);
        
        $customerId=DB::table('customers')->insertGetId(['customerfirstname'=>$firstname,
                                                            "customerlastname"=>$lastname,
                                                            'customeremail'=>$email,
                                                            'password'=> $passwordHash,
                                                            "customerphone"=>$phone,
                                                                "customernumstreet"=>$numstreet,
                                                                "customernamestreet"=>$namestreet,
                                                                "cp"=>$cp,
                                                                "city"=>$city,
        ]);
        DB::table('allusers')->insert(['alluserfirstname'=>$firstname, 'alluseremail'=>$email, 'password'=> $passwordHash,"allusercustomerid"=>$customerId, 'roleid'=>$role]);

    }

    /*function addCustomer(int $id, string $firstname, string $lastname, string $email, string $password, string $phone,  int $siret, int $numstreet, string $namestreet, int $cp, string $city, string $storename,string $image, string $description)
    {
      //  $role=DB::table('roles')->where('rolename', '=', 'customer');
        $role=1;
        $passwordHash = Hash::make($password);
        $customerId=DB::table('customers')->insertGetId(["lastname"=>$lastname, 'firstname'=>$firstname, 'email'=>$email, 'password'=> $passwordHash, "numstreet"=>$numstreet, "namestreet"=>$namestreet, "postcode"=>$postcode, "city"=>$city]);

        DB::table('people')->insert(["lastname"=>$lastname, 'firstname'=>$firstname, 'email'=>$email, 'password'=> $passwordHash,"customerId"=>$customerId, 'role'=>$role]);

       // return DB::table('customers')->insert(["lastname"=>$lastname, 'firstname'=>$firstname, 'email'=>$email, 'password'=> $passwordHash, "numstreet"=>$numstreet, "namestreet"=>$namestreet, "postcode"=>$postcode, "city"=>$city]);
    }*/


    function getCustomer(string $email, string $password): array
    {
    // TODO
    //$customers= DB::table('customers')->where('email', $email)->get()->toArray();

    $customers= DB::table('customers')->where('customeremail', $email)->get()->toArray();
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


    /*function getPeople(string $email, string $password): array
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
    return ['id'=>$people->id, 'email'=>$people->email,'firstname'=>$people->firstname, 'role'=>$people->role, 'sellerId'=>$people->sellerId, 'customerId'=>$people->customerId];
    }*/

    function getAlluser(string $email, string $password): array
    {
 

    $allusers= DB::table('allusers')->where('alluseremail', $email)->get()->toArray();
                        //customers pour loguer les customers
    if (count($allusers)==0){
        throw new Exception('Utilisateur inconnu');
    }
    $alluser=$allusers[0];

   
    $ok = Hash::check($password, $alluser->password);

        if (!$ok){
            throw new Exception('Utilisateur inconnu');
        }
    return ['alluserid'=>$alluser->alluserid, 'alluseremail'=>$alluser->alluseremail,'alluserfirstname'=>$alluser->alluserfirstname, 'roleid'=>$alluser->roleid, 'allusersellerid'=>$alluser->allusersellerid, 'allusercustomerid'=>$alluser->allusercustomerid];
    }
   


    

    function changePassword(string $email, string $oldPassword, string $newPassword): void 
    {
    // TODO

      //verifier si le mot de passe est correct:

      $people= DB::table('allusers')->where('alluseremail', $email)->get()->toArray();

      if(count($people)==0){
        throw new Exception('Utilisateur inconnu');
      }


      $ok = Hash::check($oldPassword, $people[0]->password);
      if (!$ok){
        throw new Exception('Utilisateur inconnu');
      }
      
      $newPasswordHash = Hash::make($newPassword);
      DB::table('allusers')->where('alluseremail', $email)->update(['password'=> $newPasswordHash]);
    }



    function addProduct(string $name, string $productinfo, string $image, float $price, int $category, int $productquantity ) : int
    {//version stock dans products
        return DB::table('products')->insertGetId(['productname'=> $name, 'productimage'=> $image, 'productinfo'=> $productinfo, 'productprice'=> $price, 'categoryid'=> $category, 'productquantity'=>$productquantity]);    
    }


    function addDetailProduct(int $productId, int $sellerId) : int
    {//version stock dans products
        return DB::table('detail_products')->insert(['productid'=> $productId, 'sellerid'=> $sellerId]);    
    }

   /* function addDetailProduct(int $productId, int $sellerId, int $stock) : int
    {//version stock dans dp

        return DB::table('detail_products')->insert(['productId'=> $productId, 'sellerId'=> $sellerId, 'stock'=> $stock]);    
    }*/

    /*function resetPassword(string $email, string $newPassword): void 
    {
    
      $people= DB::table('people')->where('email', $email)->get()->toArray();

      if(count($people)==0){
        throw new Exception('Utilisateur inconnu');
      }

            
      $newPasswordHash = Hash::make($newPassword);
      DB::table('people')->where('email', $email)->update(['password'=> $newPasswordHash]);
    }*/

    function resetPassword(string $email, string $newPassword): void 
    {
    
      $people= DB::table('allusers')->where('alluseremail', $email)->get()->toArray();

      if(count($people)==0){
        throw new Exception('Utilisateur inconnu');
      }

            
      $newPasswordHash = Hash::make($newPassword);
      DB::table('allusers')->where('alluseremail', $email)->update(['password'=> $newPasswordHash]);
    }


    function addOrder(DateTime $orderdate, int $orderquantity, float $price, int $customerId ) : int
    {
        return DB::table('orders')->insertGetId(['orderdate'=> $orderdate, 'orderquantity'=>$orderquantity , 'orderprice'=> $price, 'customerid'=> $customerId ]);    
    }

    function addDetailOrder(int $orderId, int $productId, int $quantity ) : int
    {
        return DB::table('detail_orders')->insertGetId(['orderid'=> $orderId, 'productid'=> $productId, 'orderproductquantity'=> $quantity]);    
    }

    function updateStock(int $productId, int $newQuantity)
    {
        DB::table('products')->where('productid', $productId)->update(['productquantity'=> $newQuantity]);
        
        //DB::table('detail_products')->where('ProductId', $productId)->update(['stock'=> $newStock]);
    }

    public function search() : array
    {
        $search=request()->input('search');
        $products=DB::table('products as p')->join('detail_products as dp','p.productid', 'dp.productid')
                                    ->join('sellers as s', 's.sellerid', 'dp.sellerid')
                                    ->where('p.productname','like', "%$search%")
                                    ->orWhere('p.productinfo', 'like', "%$search%")
                                    ->select('s.*', 'p.*', 'dp.*')
                                    ->get()
                                    ->toArray();
        return $products;
    }

    public function searchInStore(int $id) : array
    {
        
        $search=request()->input('searchInStore');
        
        $products=DB::table('products as p')->join('detail_products as dp','p.productid', 'dp.productid')
                                    ->join('sellers as s', 's.sellerid', 'dp.sellerid')
                                    ->where('s.sellerid', $id)
                                    ->where('p.productname','like', "%$search%")
                                    ->orWhere('p.productinfo', 'like', "%$search%")
                                    
                                    ->select('s.*', 'p.*', 'dp.*')
                                    ->get()
                                    ->toArray();
        return $products;
    }

    public function searchInCategory(int $id) : array
    {
        
        $search=request()->input('searchInCategory');
        
        $products=DB::table('products as p')->join('detail_products as dp','p.productid', 'dp.productid')
                                    ->join('sellers as s', 's.sellerid', 'dp.sellerid')
                                    ->where('p.productname','like', "%$search%")
                                    ->orWhere('p.productinfo', 'like', "%$search%")
                                    ->where('p.categoryid', $id)
                                    ->select('s.*', 'p.*', 'dp.*')
                                    ->get()
                                    ->toArray();
        return $products;
    }



    public function description()
    {
        $sellerId=request()->session()->get('alluser')['allusersellerid'];
        $desc=request()->input('test');
        
        DB::table('sellers')->where('sellerid', $sellerId)->update(['sellerdescription'=> $desc]);
    }

    
    public function orderValidation() : array
    {
        $sellerId=request()->session()->get('alluser')['allusersellerid'];

         return DB::table('sellers')->join('detail_products as dp', 'sellers.sellerid', 'dp.sellerid')
        ->join('detail_orders as do', 'do.productid', 'dp.productid')
        ->join('orders as o', 'o.orderid', 'do.orderid')
        ->join('products as p', 'p.productid', 'dp.productid')
        ->where('sellers.sellerid', $sellerId)
        ->orderBy('orderdate')
        ->groupBy('o.orderid', 'o.customerid', 'o.orderdate', 'dp.productid', 'p.productprice')
        ->select('o.orderid', 'o.customerid', 'o.orderdate', 'dp.productid', 'p.productprice')
        ->get()
        ->toArray();
    }

    public function sendToCustomer($orderId)
    {
        return DB::table('customers as c')
        ->join('orders as o', 'o.customerid', 'c.customerid')
        ->where('o.orderid', $orderId)
        ->select('c.customeremail')
        ->get()
        ->toArray();
    }


    public function deleteProduct(int $id){

        DB::table('products')->where('productid', $id)->delete();
        DB::table('detail_products')->where('productid', $id)->delete();

    }

    public function getInfos($sellerId) : array // plus utilisée
    {
       return  DB::table('sellers')->where('sellerid', $sellerId)->select('sellers.*')->get()->toArray();
    }
    

    

    /*function sendEmail(){

        $people=DB::table('people')->where('email', 'misteriftol@gmail.com')->get();

    }*/

    


    


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
