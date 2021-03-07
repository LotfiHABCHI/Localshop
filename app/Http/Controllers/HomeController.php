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
        return view('home',compact('products','categories', 'sellers', 'detailproducts', 'details'));
    }
    

    public function products(Request $request)
    { //Afficher la page d'un produit spécifique

        $categories = Categories::all();
        
        //select * from produits where id=?
        $product = Products::find($request->id);

        return view('products',compact('product','categories'));
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

   

    public function detailorders()
    {
        $detail_orders = DetailOrders::all();
        return view('detail_orders',compact('detail_orders'));
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


    public function ShowCategory(Request $request)
    {  //Affiche les produits vendus dans chaque catégorie

        //SELECT categories.*, products.*
        //FROM ((categories c JOIN products p ON c.id=p.catId)
        //WHERE c.id= ?

        $categories = Categories::all();

        // SELECT * FROM products WHERE catId= ?
        $products = Products::where('catId',$request->id)->get();

        return view('categories',compact('products', 'categories'));
    }




    public function showProductOfSeller(int $id)
    {  //Affiche les produits vendus par chaque commerçant

        //SELECT sellers.storename, products.name, detail_products.stock
        //FROM ((sellers s JOIN detail_products d ON s.id=d.sellerId)
        //JOIN products p ON p.id=d.productId)
        //WHERE s.id=$id?

        $sellers = Sellers::all();
        $categories = Categories::all();
        $products = DetailProducts::all();
        $details= $this->repository->productsOfSeller($id);

        return view('sellers', ['details'=>$details, 'categories'=>$categories, 'products'=>$products] );

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


   
    
}




 /* public function index()
    {
        return view('home');
    }
    */