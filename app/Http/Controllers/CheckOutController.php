<?php
namespace App\Http\Controllers;
use Cart;
use \Stripe\Stripe;
use Illuminate\Http\Request;
use App\Models\Products;
 


use App\Repositories\Repository;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order;
use App\Models\Sellers;
use Illuminate\Support\Facades\DB;
use dateTime;



class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function calculateOrderAmount(array $items): int {
        
    //     // Replace this constant with a calculation of the order's amount
    //     // Calculate the order total on the server to prevent
    //     // customers from directly manipulating the amount on the client
    //     return 1400;
    // }

    public function __construct(Repository $repository, CartController $cart)
    {
    $this->repository = $repository;
    $this->cart = $cart;
    }

    
     
    public function index()
    {
        
        // $cartCollection = Cart::getContent();
        // if( $cartCollection->count()<=0)
        //     return redirect()->route('detail_products');
        \Stripe\Stripe::setApiKey('sk_test_51IZEUWFf2uA4NKwFjkdYx9eMqDAQb0TvwiOa6Nc2ZhTyv3S3DOPCbxuwhJVUmkCccISg9yUSdad1QZLbILDcEc2X00gWlwb0Qi');
        $paymentIntent = \Stripe\PaymentIntent::create([
            'amount' => 1099,
            'currency' => 'usd',
          ]);
          $output = [
            'clientSecret' => $paymentIntent->client_secret,
          ];
          
        return view('checkout', ['clientSecret'=>$output]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //normalement ne sert a rien
    {
        //dd(request()->all());
        $customerId= request()->session()->get('alluser')['allusercustomerid'];
       
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
                return redirect()->route('home')->withErrors("Qauntite de " . $product['name'] ." insuffisante");
            }
        }
            $order=$this->repository->addOrder($date, $count, $total, $customerId );

        foreach($content as $product) {
            $detailOrder=$this->repository->addDetailOrder($order, $product['id'], $product['quantity']);
            //dd($product['quantity']);

            $this->repository->updateStock($product['id'], $newStock);
            return redirect()->route('detail_order',  ['orderId'=>$order])->with(['success'=>"Merci"]);
      
        }
        

        //dd($detailOrder);

        //dd($sellerMail);
        //dd($content);
        //dd(request()->all());
        $customer=request()->session()->get('alluser');

        //foreach($content as $row) {
            //$sellerMail=DB::table('sellers')->where('sellerid',$row->associatedModel)->select('selleremail', 'sellerid')->get();
            Mail::to($customer['alluseremail'])->send(new Order());
        //}
        $this->cart->clear();
        //dd(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function searchForm (){
        return view('search');
    }

    /*public function search (Request $request){
       $query=$request->input('q');
    //    dd($query);
    $products=Products::where('name', 'like', '%$q%')
                ->orWhere('description' , 'like', '%$q%') 
                ->paginate(6);
    return view('search_products', ['products'=>$products]);

    }*/
}