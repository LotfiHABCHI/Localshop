<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Sellers;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\DetailOrders;
use App\Models\DetailProducts;
use App\Models\People;


use App\Repositories\Repository;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Mail\resetPassword;





class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function __construct(Repository $repository)
    {
    $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $sellers = Sellers::all();
        $categories = Categories::all();
        $detailproducts = DetailProducts::all();
        $products=Products::all();
        
        $details= $this->repository->productInfos();
        //$role=$this->repository->getRole('customer');
        
        // pour la pagination
        
         /*$details= DB::table('detail_products as d')
        ->join('sellers as s','s.sellerid', 'd.sellerid')
        ->join('products as p', 'p.productid', 'd.productid')
        ->select('s.storename as store','s.sellerid as sellerId', 'p.*')
        ->paginate(10);*/
        
        return view('home',compact('products','categories', 'sellers', 'detailproducts', 'details'));
    }

    public function productsOrderedByPrice()
    {
        $sellers = Sellers::all();
        $categories = Categories::all();
        $detailproducts = DetailProducts::all();
        $products=Products::all();
        
        $details= $this->repository->productsOrderedByPrice();
        //$role=$this->repository->getRole('customer');
        
        // pour la pagination
        
         /*$details= DB::table('detail_products as d')
        ->join('sellers as s','s.sellerid', 'd.sellerid')
        ->join('products as p', 'p.productid', 'd.productid')
        ->select('s.storename as store','s.sellerid as sellerId', 'p.*')
        ->paginate(10);*/
        
        return view('home',compact('products','categories', 'sellers', 'detailproducts', 'details'));
    }

    public function productsOrderedByHigherPrice()
    {
        $sellers = Sellers::all();
        $categories = Categories::all();
        $detailproducts = DetailProducts::all();
        $products=Products::all();
        
        $details= $this->repository->productsOrderedByHigherPrice();
        //$role=$this->repository->getRole('customer');
        
        // pour la pagination
        
         /*$details= DB::table('detail_products as d')
        ->join('sellers as s','s.sellerid', 'd.sellerid')
        ->join('products as p', 'p.productid', 'd.productid')
        ->select('s.storename as store','s.sellerid as sellerId', 'p.*')
        ->paginate(10);*/
        
        return view('home',compact('products','categories', 'sellers', 'detailproducts', 'details'));
    }

    public function productsOrderedByDate()
    {
        $sellers = Sellers::all();
        $categories = Categories::all();
        $detailproducts = DetailProducts::all();
        $products=Products::all();
        
        $details= $this->repository->productsOrderedByDate();
        //$role=$this->repository->getRole('customer');
        
        // pour la pagination
        
         /*$details= DB::table('detail_products as d')
        ->join('sellers as s','s.sellerid', 'd.sellerid')
        ->join('products as p', 'p.productid', 'd.productid')
        ->select('s.storename as store','s.sellerid as sellerId', 'p.*')
        ->paginate(10);*/
        
        return view('home',compact('products','categories', 'sellers', 'detailproducts', 'details'));
    }
    
    

    public function products(int $id, int $sellerId)
    { //Afficher la page d'un produit spécifique

        $categories = Categories::all();
        
        //select * from produits where id=?
       //$product = Products::find($request->id); 
       $products=$this->repository->product($id);    
       $productName=DB::table('products')->where('productid',$id)->select('productname')->get(); //a mettre plutot dans une fct dans le repository peut etre
       $count=$this->repository->productCount($sellerId);
       // dd(request()->all());
       //dd($products);


        return view('product/product',compact('products','categories', 'productName', 'count'));
    }


   /* public function sellers()
    {

        $sellers = Sellers::all();
        //select * from sellers

        return view('sellers',compact('sellers'));
    }*/

    /*public function sellers(Request $request)
    {

        $detailProducts = DetailProducts::all();
        $sellers = Sellers::find($request->id);
        //select * from produits where id=?
        return view('sellers',compact('sellers','detailProducts'));
    }*/

    public function customers()
    {
        $customers = Customers::all();
        //select * from customers
        return view('customers',compact('customers'));
    }

    public function orders()
    {
        $orders = Orders::all();
        //select * from orders

        return view('orders',compact('orders'));
    }

   

    /*public function ordersOfCustomer(int $customerid)
    {
        $detail_orders = DetailOrders::all();
        $customers = Customers::all();
        $orders = Orders::all();

        $details= $this->repository->ordersOfCustomer($customerid);
       //dd($details);

        return view('detail_orders',compact('details'));
    }*/

    public function ordersOfCustomer(int $customerid /*, int $orderid*/)
    {
        $detail_orders = DetailOrders::all();
        $customers = Customers::all();
        //$orders = Orders::find(request()->customerId);

        $details= $this->repository->ordersOfCustomer($customerid);
       // $detailOrders= $this->repository->detailOrder($orderid);
        //dd($details);
        //dd($details, $orders);
        
        return view('customers/orders',compact(/*'orders',*/ 'details'));
    }


    public function detailOrder(int $orderId)
    {
        $detailOrders= $this->repository->detailOrder($orderId);
        return view('customers/detail_orders',compact('detailOrders'));

    }

    public function detailProducts()
    {
        $detail_products = DetailProducts::all();
        
        return view('detail_products',compact('detail_products'));
    }


    /*public function showProduct(int $id)
    {
        $products = $this->repository->productsOfCategory($id);
       
        return view('products.show', ['products'=>$products] );
    }*/


    public function ShowCategory(int $id)
    {  //Affiche les produits vendus dans chaque catégorie

        //SELECT categories.*, products.*
        //FROM ((categories c JOIN products p ON c.id=p.catId)
        //WHERE c.id= ?

        $categories = Categories::all();

        // SELECT * FROM products WHERE catId= ?
        
        //$products = Products::where('catId',$request->id)->get();
        $products=$this->repository->detailProductsOfCategory($id);
        $cat=DB::table('categories')->where('categoryid',$id)->select('categoryname')->get(); //a mettre plutot dans une fct dans le repository peut etre
        //dd($cat);
        return view('product/category',compact('products', 'categories', 'cat'));
    }




    public function showProductsOfSeller(int $id)
    {  //Affiche les produits vendus par chaque commerçant

        //SELECT sellers.storename, products.name, detail_products.stock
        //FROM ((sellers s JOIN detail_products d ON s.id=d.sellerId)
        //JOIN products p ON p.id=d.productId)
        //WHERE s.id=$id?
       
        //dd($seller);
        $sellers = Sellers::all();
        $categories = Categories::all();
        $products = DetailProducts::all();
        $details= $this->repository->productsOfSeller($id);
        //dd($details[1]->productId);
        $count=$this->repository->productCount($id);
       // dd($details);
        /*if(session()->has('alluser')){
            $sellerId=request()->session()->get('alluser')['allusersellerid'];
            $seller=$this->repository->getInfos($sellerId);
        }
        else $seller=$details;*/


        $seller=DB::table('sellers')->where('sellerid', $id)->get()->toArray();
        $productsOfSeller=$this->repository->productsOfSeller($id);
        //$count=$this->repository->productCount($id);

        return view('sellers/sellerPage', ['seller'=>$seller, 'productsOfSeller'=>$productsOfSeller, 'details'=>$details, 'categories'=>$categories, 'products'=>$products, 'sellers'=>$sellers, 'count'=>$count] );

    }

    public function showProductsinfos()
    {
    //Affiche les infos des produits
        //SELECT sellers.storename, products.*
        //FROM ((sellers s JOIN detail_products d ON s.id=d.sellerId)
        //JOIN products p ON p.id=d.productId)
        //WHERE s.id=$id?

        $sellers = Sellers::all();
        

        // SELECT * FROM produits WHERE catId= ?
        //$products = DetailProducts::where('sellerId',$request->id)->get();

        $categories = Categories::all();
        $detailproducts = DetailProducts::all();
        $products=Products::all();
        $details= $this->repository->productInfos();

       
        return view('test', ['details'=>$details, 'categories'=>$categories, 'products'=>$products, 'detailproducts'=>$detailproducts] );

       
    }


    public function showRegisterForm()
    {
        return view('/log/registerSeller');
    }

    public function sellerRegister(Request $request, Repository $repository)
    {
        $rules = [
            'firstname' => ['required'], 
            'lastname' => ['required'], 
            'email' => ['required', 'email'],
            'phone' => ['required'], 
            'siret' => ['required'],
            'numstreet' => ['required'], 
            'namestreet' => ['required'],
            'postcode'=>['required'],
            'city'=>['required'],
            'storename' => ['required'], 
            'image'=>['required'],
            'description'=>['nullable'],
            'password' => ['required'], 
            'passwordConfirm'=>['required']

        ];
        $messages = [
            'lastname.required' => 'Vous devez saisir un nom.',
            'firstname.required' => 'Vous devez saisir un prénom.',
            'email.required' => 'Vous devez saisir un e-mail.',
            'email.email' => 'Vous devez saisir un e-mail valide.',
            'password.required' => "Vous devez saisir un mot de passe.",
            'passwordConfirm.required' => "Vous devez confirmer le mot de passe.",
            'phone.required' => 'Vous devez saisir un numéro de téléphone.',
            'numstreet.required' => 'Vous devez saisir un numéro de rue.',
            'namestreet.required' => 'Vous devez saisir un nom de rue.',
            'postcode.required' => 'Vous devez saisir un code postal.',
            'city.required' => 'Vous devez saisir une ville.',
            'storename.required' => 'Vous devez saisir le nom de votre enseigne.',
            'siret.required' => 'Vous devez saisir votre numéro SIRET.',
            'image.required' => 'Vous devez saisir une image.',
            'description' => 'Vous devez saisir une description.',

        ];

        
        $validatedData = $request->validate($rules, $messages);
        $lastname = $validatedData['lastname'];
        $firstname = $validatedData['firstname'];
        $email = $validatedData['email'];
        $phone = $validatedData['phone'];
        $password = $validatedData['password'];
        $numstreet = $validatedData['numstreet'];
        $namestreet = $validatedData['namestreet'];
        $postcode = $validatedData['postcode'];
        $city = $validatedData['city'];
        $storename = $validatedData['storename'];
        $siret = $validatedData['siret'];
        $image = $validatedData['image'];
        $description = $validatedData['description'];


        if($request->hasFile('image')){
            //$request->file('image');
            $fileName=$request->image->getClientOriginalName();
            $request->image->storeAs('images', $fileName, 'public');
            
        }


        if($validatedData['password']==$validatedData['passwordConfirm']){
            try {
                $this->repository->addSeller($firstname, $lastname, $email,  $password, $phone, $siret, $numstreet, $namestreet, $postcode, $city, $storename, $fileName, $description ); 
                 $request->session()->put('alluser', $this->repository->getAlluser($email, $password));
                
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors("Impossible de vous inscrire.");
            }
        }else{
            return redirect()->back()->withInput()->withErrors("mots de passe différents.");
        }
        return redirect()->route('home');
    }


        ////////////////////// ↓ copier coller de web_cci register //////////////////////


    public function showChangePasswordForm() 
    {
        return view('log/changePassword');
    }

    public function changePassword(Request $request,Repository $repository)
    {
        $rules = [
            'email' => ['required', 'email', 'exists:allusers,alluseremail'],
            'old_password' => ['required'],
            'new_password' => ['required'],
            'new_passwordConfirm' => ['required'],
        ];
        $messages = [
            'email.required' => 'Vous devez saisir un e-mail.',
            'email.email' => 'Vous devez saisir un e-mail valide.',
            'email.exists' => "Cet utilisateur n'existe pas.",
            'old_password.required' => "Vous devez saisir votre ancien mot de passe.",
            'new_password.required' => "Vous devez saisir un nouveau mot de passe.",
            'new_passwordConfirm.required' => "Vous devez confirmer votre nouveau mot de passe.",
        ];
        $validatedData = $request->validate($rules, $messages);
        $email = $validatedData['email'];
        if($validatedData['new_password']==$validatedData['new_passwordConfirm']){
            try {

                $user=$this->repository->getAlluser($email, $validatedData['old_password']);

                $user=$this->repository->changePassword($email,$validatedData['old_password'], $validatedData['new_password'] );
            
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors("Impossible de changer le mot de passe.");
            }
        }else{
            return redirect()->back()->withInput()->withErrors("mots de passe différents.");
        }
        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('/log/login');
    }

    public function login(Request $request, Repository $repository)
    {
        $rules = [
        'email' => ['required', 'email', 'exists:allusers,alluseremail'],
            'password' => ['required']
        ];
        $messages = [
            'email.required' => 'Vous devez saisir un e-mail.',
            'email.email' => 'Vous devez saisir un e-mail valide.',
            'email.exists' => "Cet utilisateur n'existe pas.",
            'password.required' => "Vous devez saisir un mot de passe.",
        ];
        $validatedData = $request->validate($rules, $messages);
        //$pass = Hash::make($validatedData['password']);
        $email = $validatedData['email'];
        try {
            //$this->repository->connectValide($email);
            $infos=$request->session()->put('alluser', $this->repository->getAlluser($email, $validatedData['password']));
            $info= $request->session()->get('alluser');
           //dd($info);

        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors("Impossible de vous authentifier.");
        }
        
        
        return redirect()->route('home');
    }

    public function showResetForm()
    {
        return view('log/reset');
    }

    public function showResetPasswordForm()
    {// formulaire de réinitialisation du mot de passe
        return view('log/resetPassword');
    }

    public function reset(Request $request, Repository $repository)
    {// pour savoir a quel mail envoyer le lien de réinitialisation

        //dd(request()->all());
        $rules = [
            'email' => ['required', 'email', 'exists:allusers,alluseremail'],
        ];
            $validatedData = $request->validate($rules);
            $email = $validatedData['email'];
        Mail::to($email)
            ->send(new resetPassword());
            return back()->with(['success'=>"Un lien de réinitialisation a été envoyé à votre adresse e-mail"]);

    }

    public function resetPassword(Request $request, Repository $repository)
    {//réinitialisation du mot de passe
        $rules = [
            'email' => ['required', 'email', 'exists:allusers,alluseremail'],
            'new_password' => ['required'],
            'new_passwordConfirm' => ['required'],
        ];
        $messages = [
            'email.required' => 'Vous devez saisir un e-mail.',
            'email.email' => 'Vous devez saisir un e-mail valide.',
            'email.exists' => "Cet utilisateur n'existe pas.",
            'new_password.required' => "Vous devez saisir un nouveau mot de passe.",
            'new_passwordConfirm.required' => "Vous devez confirmer votre nouveau mot de passe.",
        ];
        $validatedData = $request->validate($rules, $messages);
        $email = $validatedData['email'];
       

        if($validatedData['new_password']==$validatedData['new_passwordConfirm']){
            try {

                $user= $this->repository->resetPassword($email,  $validatedData['new_password']);
            
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors("Impossible de changer le mot de passe.");
            }
        }else{
            return redirect()->back()->withInput()->withErrors("mots de passe différents.");
        }
        return redirect()->route('home');
    }
        ////////////////////// ↑ copier coller de web_cci register //////////////////////

        public function showFormContact(){
            return view('footer/nousContacter');
        }   
       
     
        public function contact()
        {
            //dd(request()->all());
            $contact=request()->validate([
                'firstname'=> 'required', 
                'lastname'=> 'required', 
                'email' => 'required',
                'message' => 'required'
            ]);
            Mail::to('localshop@localshop.com')
                ->send(new Contact($contact));
                return back()->with(['success'=>"Votre message a bien été envoyé"]);

            //pour envoyer un msg aux people
            /*$people = People::all();
            Mail::to($people)->send(new Contact(request()->all()));*/
        }

        public function search()
        {
           // $categories = Categories::all();

            $sellers = Sellers::all();
            $categories = Categories::all();
            $detailproducts = DetailProducts::all();
            
            //$search=request()->input('search');
            $products = $this->repository->search();
            //dd(request()->all());
            //dd($products);
            //dd(request()->all());
            $sellerId=request()->id;

            if(count($products)==0){
               
                return  redirect()->back()->withInput()->withErrors(' $store[0]["storename"] ne vend pas de ça.'); # ou l'appel d'une fonction ou méthode qui peut lever une exception
            }
            
            //dd(request()->all());
            return view('product/searchProduct', compact('products', 'sellers', 'categories'));
        }

        public function searchInStore()
        {
           // $categories = Categories::all();

            $sellers = Sellers::all();
            $categories = Categories::all();
            $detailproducts = DetailProducts::all();
            //$count=$this->repository->productCount($id);
            $sellerId=request()->sellerId;

            $store=Sellers::where('sellerid',$sellerId)->get()->toArray();// [$sellerId]['storename'];
            //dd($sellerId, $store[0]['storename']);
            
                $products = $this->repository->searchInStore($sellerId);
           

            if(count($products)==0){
               
                return  redirect()->back()->withInput()->withErrors(' $store[0]["storename"] ne vend pas de ça.'); # ou l'appel d'une fonction ou méthode qui peut lever une exception
            }
            //dd($sellerId);
            
            //dd(request()->all());
            return view('product/searchProductOfSeller', compact('products', 'sellers', 'categories', 'store' ));
        }

        public function searchInCategory()
        {
           // $categories = Categories::all();

            $sellers = Sellers::all();
            $categories = Categories::all();
            $detailproducts = DetailProducts::all();
            //$count=$this->repository->productCount($id);
           // $sellerId=request()->sellerId;
            $categoryId=request()->categoryId;
            //dd($categoryId);
            //dd($sellerId, $categoryId);
            //$cat=Categories::where('categoryid',$categoryid)->get()->toArray();// [$sellerId]['storename'];
            //dd($sellerId, $store[0]['storename']);
            
                $products = $this->repository->searchInCategory($categoryId);
           
            //dd($products);
            if(count($products)==0){
               
                return  redirect()->back()->withInput()->withErrors(' $store[0]["storename"] ne vend pas de ça.'); # ou l'appel d'une fonction ou méthode qui peut lever une exception
            }
            //dd($sellerId);
            
            
            //dd(request()->all());
            return view('searchProductInCategory', compact('products', 'sellers', 'categories' ));
        }

        /*public function productview( Request $request){

            $productid=$request->productid;
            $price=explode("-", $request->price);
            $start=$price[0];
            $end=$price[1];
            if($productid="" && $price!="")
            {
                $data=DB::table('products')
                //->join('cats', 'cats.id' , 'products.cats_id')
                ->where('products.productid, $productid')
                ->where('products.productprice',">=", $start)
                ->where('products.productprice', " <=",$end)
                ->get();
        
        
            }else if($productid!=""){
                $data =DB::table('products')
                //->join('cats', 'cats.id' , 'products.cats_id')
                ->where('products.productid, $productid')
                ->get();
        
        
            }else if($price!=""){
                $data=DB::table('products')
                ->where('products.productprice',">=", $start)
                ->where('products.productprice', "<=", $end)
                ->get();
            }
        

            if(count($data)==0){
                echo"<h1>on a rien trouvé</h1>";
            }else{
        
            return view('home',['data'=>$data, 'catByuser'=>$data[0]->cat_name]);
            }
        }*/
    








   public function test(Request $req)
   {
       //print_r($req->input());
        $info=$req->session()->put('info', $req->input());
        /*print_r($info);*/

       $info= $req->session()->get('info');
       print_r($info['password']);
   }

   public function faq()
   {
       return view('footer/faq');
   }

   public function about()
   {
       return view('footer/about');
   }

   public function mentions()
   {
       return view('footer/mentions');
   }

    
}




 /* public function index()
    {
        return view('home');
    }
    */