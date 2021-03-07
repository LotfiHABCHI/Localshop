<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Products::find($request->id);
          
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => ['image'=>$product->image],
           
           // 'associatedModel' => $product,
          ]
        );
        return redirect(route('cart.index'));
        //return redirect()->back()->with('cart', 'ok');
    }

    public function index()
{
    $content = Cart::getContent()->sort();
    $total = Cart::getTotal();
    //dd($content, $total);
    return view('cart.index', compact('content', 'total'));
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

}
