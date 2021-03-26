<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order;
use App\Models\Sellers;
use Illuminate\Support\Facades\DB;
use dateTime;



use Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct(Repository $repository)
    {
    $this->repository = $repository;
    }
    

    public function add(Request $request)
    {
        //$cartItem = Cart::add(455, 'Sample Item', 100.99, 2, array())->associate('Product');

        $product=$this->repository->product($request->id);    
       // $product = Products::find($request->id);
          //dd($product);
          $cartItem=Cart::add([
            'id' => $product[0]->productid,
            'name' => $product[0]->productname,
            'price' => $product[0]->productprice,
            'description' => $product[0]->productinfo,
            'quantity' => $request->quantity,
            'attributes' => ['image'=>$product[0]->productimage],
            'associatedModel' => $product[0]->sellerid,
          ]
        );
        //dd($cartItem);
        return redirect(route('cart.index'));
        //return redirect()->back()->with('cart', 'ok');
    }

    public function index()
    {
       
        $content = Cart::getContent()->sort();
        $total = Cart::getTotal();
        $count=Cart::getContent()->count();
       
                //dd($content, $total, $sellerMail);
        return view('cart.index', compact('content', 'total', 'count'));
    }

    public function update(Request $request, $id)
    {
        Cart::update($id, [
            'quantity' => ['relative' => false, 'value' => $request->quantity],
        ]);
        return redirect(route('cart.index'));
    }
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect(route('cart.index'));
    }

    public function clear()
    {
        Cart::clear();
        return redirect(route('cart.index'));

    }

    public function contact()
    {
        $customerId= request()->session()->get('alluser')['allusercustomerid'];
        //dd($customerId);

        $content = Cart::getContent();
        $total = Cart::getTotal();
        $date = new \DateTime();
        $count=Cart::getContent()->count();
        //$seller = Cart::get($content[2]['id']);

    
        foreach($content as $product) {
           //version stock dp// $stock=DB::table('detail_products')->where('ProductId', $product['id'])->select('stock')->get();//faire une méthode getStock dans repository
           
            $stock=DB::table('products')->where('productid', $product['id'])->select('productquantity')->get();//faire une méthode getStock dans repository

           $newStock=$stock[0]->productquantity-$product['quantity'];

            if($newStock<0){
                return redirect()->back()->withErrors("Qauntite de " . $product['name'] ." insuffisante");
            }
        }
            $order=$this->repository->addOrder($date, $count, $total, $customerId );

        foreach($content as $product) {
            $detailOrder=$this->repository->addDetailOrder($order, $product['id'], $product['quantity']);
            //dd($product['quantity']);

            $this->repository->updateStock($product['id'], $newStock);
        }

        //dd($detailOrder);

        //dd($sellerMail);
        //dd($content);
        //dd(request()->all());
        foreach($content as $row) {
            $sellerMail=DB::table('sellers')->where('sellerid',$row->associatedModel)->select('selleremail', 'sellerid')->get();
            Mail::to($sellerMail[0]->selleremail)->send(new Order());
        }
        $this->clear();
        return redirect()->route('detail_order',  ['orderId'=>$order]);
      
    }

}
