<?php

namespace App\Http\Controllers;


use App\Models\Categories;
use App\Models\Products;
use App\Models\Sellers;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\DetailOrders;
use App\Models\DetailProducts;

use App\Repositories\Repository;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;




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
        
        // pour la pagination
        /*
         $details= DB::table('detail_products as d')
        ->join('sellers as s','s.id', 'd.sellerId')
        ->join('products as p', 'p.id', 'd.productId')
        ->select('s.storename as store','s.id as sellerId', 'p.*', 'd.stock')
        ->orderBy('p.price')
        ->paginate(10);
        */
        return view('home',compact('products','categories', 'sellers', 'detailproducts', 'details'));
    }
    

    public function products(int $id)
    { //Afficher la page d'un produit spécifique

        $categories = Categories::all();
        
        //select * from produits where id=?
       //$product = Products::find($request->id); 
       $products=$this->repository->product($id);    
       $productName=DB::table('products')->where('id',$id)->select('name')->get(); //a mettre plutot dans une fct dans le repository peut etre

        return view('products',compact('products','categories', 'productName'));
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

   

    public function ordersOfCustomer(int $id)
    {
        $detail_orders = DetailOrders::all();
        $customers = Customers::all();
        $orders = Orders::all();

        $details= $this->repository->ordersOfCustomer($id);
       


        return view('detail_orders',compact('details'));
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
        $cat=DB::table('categories')->where('id',$id)->select('name')->get(); //a mettre plutot dans une fct dans le repository peut etre
        //dd($cat);
        return view('categories',compact('products', 'categories', 'cat'));
    }




    public function showProductsOfSeller(int $id)
    {  //Affiche les produits vendus par chaque commerçant

        //SELECT sellers.storename, products.name, detail_products.stock
        //FROM ((sellers s JOIN detail_products d ON s.id=d.sellerId)
        //JOIN products p ON p.id=d.productId)
        //WHERE s.id=$id?

        $sellers = Sellers::all();
        $categories = Categories::all();
        $products = DetailProducts::all();
        $details= $this->repository->productsOfSeller($id);
        //dd($details[1]->productId);
        $count=$this->repository->productCount($id);
        //dd($details);

        return view('sellers/sellers', ['details'=>$details, 'categories'=>$categories, 'products'=>$products, 'sellers'=>$sellers, 'count'=>$count] );

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
        return view('/sellers/seller_register');
    }

    public function sellerRegister(Request $request, Repository $repository)
    {
        $rules = [
            'lastname' => ['required'], 
            'firstname' => ['required'],  
            'email' => ['required', 'email'],
            'phone' => ['required'], 
            'password' => ['required'], 
            'passwordConfirm'=>['required'],
            'numstreet' => ['required'], 
            'namestreet' => ['required'],
            'postcode'=>['required'],
            'city'=>['required'],
            'storename' => ['required'], 
            'siret' => ['required'], 

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


        if($validatedData['password']==$validatedData['passwordConfirm']){
            try {
                $this->repository->addSeller($lastname, $firstname, $email, $phone, $password, $numstreet, $namestreet, $postcode, $city, $storename, $siret); 
                 $request->session()->put('people', $this->repository->getPeople($email, $password));
                
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
        return view('changepass');
    }

    public function changePassword(Request $request,Repository $repository)
    {
        $rules = [
            'email' => ['required', 'email', 'exists:people,email'],
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

                $user=$this->repository->getPeople($email, $validatedData['old_password']);

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
        return view('/sellers/seller_login');
    }

    public function login(Request $request, Repository $repository)
    {
        $rules = [
        'email' => ['required', 'email', 'exists:people,email'],
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
            $infos=$request->session()->put('people', $this->repository->getPeople($email, $validatedData['password']));
            $info= $request->session()->get('people');
           //dd($info);

        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors("Impossible de vous authentifier.");
        }
        
        
        return redirect()->route('home');
    }

    public function showResetPasswordForm()
    {
        return view('reset_password');
    }

    public function resetPassword(Request $request, Repository $repository){
        $rules = [
            'email' => ['required', 'email', 'exists:people,email'],
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
        Mail::to($request->user())->send("oo");

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

   public function test(Request $req)
   {
       //print_r($req->input());
        $info=$req->session()->put('info', $req->input());
        /*print_r($info);*/

       $info= $req->session()->get('info');
       print_r($info['password']);
   }
    
}




 /* public function index()
    {
        return view('home');
    }
    */