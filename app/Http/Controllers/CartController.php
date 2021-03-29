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
            'id' => $product[0]->id,
            'name' => $product[0]->name,
            'price' => $product[0]->price,
            'description' => $product[0]->description,
            'quantity' => $request->quantity,
            'attributes' => ['image'=>$product[0]->image],
            'associatedModel' => $product[0]->sellerId,
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
        $customerId= request()->session()->get('people')['customerId'];
        //dd($customerId);

        $content = Cart::getContent();
        $total = Cart::getTotal();
        $date = new \DateTime();
        //$seller = Cart::get($content[2]['id']);

    
        foreach($content as $product) {
            $stock=DB::table('detail_products')->where('ProductId', $product['id'])->select('stock')->get();//faire une méthode getStock dans repository
            $newStock=$stock[0]->stock-$product['quantity'];

            if($newStock<0){
                return redirect()->back()->withErrors("Stock de " . $product['name'] ." insuffisant");
            }
        }
            $order=$this->repository->addOrder($customerId, $total, $date);

            foreach($content as $product) {
                $detailOrder=$this->repository->addDetailOrder($product['id'], $order, $product['quantity']);
                $this->repository->updateStock($product['id'], $newStock);

            }
            //dd($product['quantity']);

           

        

        //dd($detailOrder);

        //dd($sellerMail);
        //dd($content);
        //dd(request()->all());
        foreach($content as $row) {
            $sellerMail=DB::table('sellers')->where('id',$row->associatedModel)->select('email', 'id')->get();
            Mail::to($sellerMail)->send(new Order());
        }
        $this->clear();
        return redirect()->route('detail_order',  ['orderId'=>$order]);
      
    }

}
