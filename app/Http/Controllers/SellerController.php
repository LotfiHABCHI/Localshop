<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Repositories\Repository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



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


        $sellerId=$request->session()->get('people')['sellerId'];
        if($request->hasFile('image')){
            //$request->file('image');
            $fileName=$request->image->getClientOriginalName();
            $request->image->storeAs('images', $fileName, 'public');
            
        }
       
            try {
                $prod=$this->repository->addProduct($name, $description, $fileName, $price, $category); 
                $this->repository->addDetailProduct($prod,$sellerId, $stock); 

            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors("Impossible d'ajouter le produit.");
            }
       
        
        return redirect()->route('home');

    }

    public function productsOfSeller(int $id)
    {
        $products=$this->repository->productsOfSeller($id);
        $count=$this->repository->productCount($id);

        return view('sellers/sellerProducts', compact('products', 'count'));

    }

    public function updateStock(Request $request, $id)
    {
        $sellerId= $request->session()->get('people')['sellerId'];

        $this->repository->updateStock($id, $request->stock);
        return redirect()->route('sellerProducts', ['sellerId'=>session()->get('people')['sellerId']]);
        
    }

}
