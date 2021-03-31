@extends('layouts.base')

@section('title')
{{$productName[0]->productname}}
@endsection
@section('css')
  @parent
  <link href="{{ asset('css/sellers/seller.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/product/product.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
  <div class="category">
      <ul>
        @foreach($categories as $category)
          <li>
            <a href="{{route('showProductsOfCategory',['id'=>$category->categoryid])}}">
            <img src="{{asset('storage/images/'.$category->categoryimage)}}">
            </a>
          </li>
        @endforeach
      </ul>
  </div>

<div id="core_product">


  <div class="store">
@foreach($products as $product)
      <div class="seller">
        <h2><a href="{{route('showProductOfSeller',['id'=>$product->sellerid])}}">{{$product->storename}}</a></h2>
        <div id="imgSeller">
        <img src="{{asset('storage/images/'.$product->sellerimage)}}" alt="sellerImage">           
        </div>
        <div id="divAddDescription">
            <p>{{$product->sellerdescription}}</p>
            <p> Adresse :{{$product->sellernumstreet}} {{$product->sellernamestreet}} </p>
            <p> Téléphone : {{$product->sellerphone}}</p>
            <p> Nombre de produits en vente : {{$count}}</p>
        </div>
      
        <!--<div class="nb_item">
            <p>Nombre de produits en vente :<br> count</p>
        </div> -->
      @endforeach
      </div>



      <div class="products">
        @foreach($products as $product)
          <div class="product">
      
            <div id="imgP">
              <img src="{{asset('storage/images/'.$product->productimage)}}" alt="image">           
           </div>

            <div id="txtproduct">
              <div id="txtinfo">
              <div id="category">
              {{$product->categoryname}}

              </div>

            <div id="name">
              <a href="#">
                {{$product->productname}}
              </a>
            </div>
          
            <div id="info">{{$product->productinfo}}</div>

           

          </div>

          <div id="txtprice">
            <div id="price">{{$product->productprice}} €/pièce</div>
            @if(session()->has('alluser') && (session()->get('alluser')['roleid']==2 ) OR !(session()->has('alluser')))
            <form class="formQuantity"  action="{{route('cart.add', ['id'=>$product->productid])}}" method="POST" id="add_cart">
                      @csrf
                      <label for="quantity"></label>
                      <input type="number" value="1"  id="quantity" name="quantity" min="0">
                      @if (session()->has('alluser'))
                
                        <button type="submit" form="add_cart" class="btn btn-sm btn-outline-secondary"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="30" width="30" /></button>
              
                      @else 
                        <a href="{{route('login')}}"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39" /></a> 
                      @endif
                    </form>
          @endif
          </div>
          @endforeach

</div>

        </div>

      </div>



  </div>



</div>
@endsection