@extends('layouts.base')

@section('title')
{{$cat[0]->categoryname}}
@endsection

@section('css')
  @parent
  <link href="{{ asset('css/sellers/seller.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/home/home.css') }}" rel="stylesheet" type="text/css" />
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
  
<div id="core_category">

<div class="product">
<div id="products">
        @foreach ($products as $product)
            <div class="product_card">
            
              <div class="imgC">
                <a href="{{route('product',['id'=>$product->productid, 'sellerId'=>$product->sellerid])}}">
                  <img src="{{asset('storage/images/'.$product->productimage)}}" alt="image">
                </a>
              </div>

              <hr>
              <div class="txtproduct">
                <p class="storeN">
                <a href="{{route('showProductOfSeller',['id'=>$product->sellerid])}}">{{$product->storename}}</a>

                </p>

                <p class="productN">
                  <a href="{{route('product',['id'=>$product->productid, 'sellerId'=>$product->sellerid])}}">
                  {{$product->productname}}
                  </a>
                </p>
                
                
                <div class="info_product">{{$product->productinfo}}</div>
                <div class="price_product">{{number_format($product->productprice,2)}}€/pièce</div>
              </div>
              
            </div>
      @endforeach
      </div>
      </div>


  
</div>



      

@endsection