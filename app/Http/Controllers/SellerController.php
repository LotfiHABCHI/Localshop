<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderReady;

use App\Http\Requests\OrderReadyRequest;




use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct(Repository $repository)
    {
    $this->repository = $repository;
    }
    
    public function showAddProductForm()
    {
        $categories = Categories::all();
       
        return view('/sellers/add_product',compact('categories'));
    }

    public function addProduct(Request $request, Repository $repository)
    {       
        $rules = [
            'name' => ['required'], 
            'description' => ['required'],  
            'price' => ['required'], 
            'category' => ['required'], 
            'image' => ['required'],
            'stock' => ['required'],

        ];
        $messages = [
            'name.required' => 'Vous devez saisir un nom.',
            'description.required' => "Vous devez saisir une description de l'article.",
            'price.required' => 'Vous devez saisir le prix.',
            'category.required' => "Vous devez saisir la catégorie.",
            'image.required' => "Vous devez télécharger une photo de l'article.",
            'stock.required' => "Vous devez saisir le stock.",
        ];

        
        $validatedData = $request->validate($rules, $messages);
        $name = $validatedData['name'];
        $description = $validatedData['description'];
        $price = $validatedData['price'];
        $category = $validatedData['category'];
        $image = $validatedData['image'];
        $stock = $validatedData['stock'];


        $sellerId=$request->session()->get('alluser')['allusersellerid'];
        if($request->hasFile('image')){
            //$request->file('image');
            $fileName=$request->image->getClientOriginalName();
            $request->image->storeAs('images', $fileName, 'public');
            
        }
       
            try {

                $productId=$this->repository->addProduct($name, $description, $fileName, $price, $category, $stock); 
                $this->repository->addDetailProduct($productId,$sellerId); 

                /*$prod=$this->repository->addProduct($name, $description, $fileName, $price, $category); 
                $this->repository->addDetailProduct($prod,$sellerId, $stock); */

            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors("Impossible d'ajouter le produit.");
            }
       
        
        return redirect()->route('home');

    }

    public function productsOfSeller(int $id)
    {
        $seller=DB::table('sellers')->where('sellerid', $id)->get()->toArray();
        $products=$this->repository->productsOfSeller($id);
        $count=$this->repository->productCount($id);
        //dd($seller,$products, $count);

        return view('sellers/sellerProducts', compact('seller', 'products', 'count'));

    }

    public function updateStock(Request $request, $id)
    {
        $sellerId= $request->session()->get('alluser')['allusersellerid'];

        $this->repository->updateStock($id, $request->stock);
        return redirect()->route('sellerProducts', ['sellerId'=>session()->get('alluser')['allusersellerid']]);
        
    }

    /*public function editDescription($sellerId, Request $request)
    {
        $rules=[
            'txtDescription' => ['required'], 
        ]; 
        $messages = [
            'txtDescription.required' => 'Vous devez saisir un txtDescription.',
        ];

        $validatedData = $request->validate($rules, $messages);
        $txt = $validatedData['txtDescription'];

        try {

            $this->repository->description($sellerId);
 

        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors("Impossible d'ajouter le la desc.");
        }
   
    
        return redirect()->route('sellerProducts');

    }*/

    public function editDescription()
    {

            $this->repository->description();

    
        return redirect()->route('sellerProducts');

    }

    public function orderValidation()
    {
        $orders=$this->repository->orderValidation();
        

        return view('sellers/orderValidation', compact('orders'));
    }

    public function contact()
    {

       // $order=$request->orderid;
        //dd($order);
        //dd(request()->all());
        $customerid=request()->id;
        //dd($customerid);
       /* $contact=request()->validate([
            'name'=> 'required', 
            'email' => 'required',
            'message' => 'required'
        ]);*/
        
        $customerMail=DB::table('customers')->where('customerid',$customerid)->select('customeremail')->get();
            //dd($customerMail);
        Mail::to($customerMail[0]->customeremail)
            ->send(new OrderReady());

        return redirect()->back();
          
            
        //pour envoyer un msg aux people
        /*$people = People::all();
        Mail::to($people)->send(new Contact(request()->all()));*/
    }



}
