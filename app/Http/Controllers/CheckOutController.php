<?php
namespace App\Http\Controllers;
use Cart;
use \Stripe\Stripe;
use Illuminate\Http\Request;
use App\Models\Products;
 
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
     
    public function index()
    {
        // $cartCollection = Cart::getContent();
        // if( $cartCollection->count()<=0)
        //     return redirect()->route('detail_products');
        \Stripe\Stripe::setApiKey('sk_test_51ITCtVJAi7S74ISi2jOoNrDnnUXjxsCt16vsRnw0f9XM6dds9xPNajouNpzYbTNgNqC8RmXSdjHR7ULHwli6sVWM00dP4jEKCF');
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
    public function store(Request $request)
    {
        // Cart::destroy();
        $data = $request->json()->all();
        return $data['paymentIntent'];
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
    public function search (Request $request){
       $query=$request->input('q');
    //    dd($query);
    $products=Products::where('name', 'like', '%$q%')
                ->orWhere('description' , 'like', '%$q%') 
                ->paginate(6);
    return view('search_products', ['products'=>$products]);

    }
}