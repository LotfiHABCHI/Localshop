@extends('layouts.base')

@section('title', 'Accueil')

@section('css')
  @parent
  <link href="{{ asset('css/sellers/seller.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/home/home.css') }}" rel="stylesheet" type="text/css" />

@endsection



@section('content')
<div id="core_home" >
<div class="core_prehome">
      <div id="text">
        <p id="click">
          Click and Collect, tout est dans le nom !
        </p>
        <p id="below_click">
          Consommez près de chez vous et facilement.
        </p>
      </div>
</div>

  <div class="search"> 
    <form method="GET" action="{{route('searchProduct')}}">
      @csrf
      @if ($errors->any())
	<div class="alert alert-warning">
	Aucun de nos commerçants ne propose de {{old('search')}} &#9785;
	</div>
	@endif

      <div class="form-group">
        <input type="search" id="inputSearch" name="search" placeholder="Que recherchez-vous ?"> 
        @error('search')
        <div id="search_feedback" class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        <button type="submit" id="btnSearch">&#x1F50D;</button>

      </div>

    </form>
  </div>

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


        

        <div id="productSearch">
          
        

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
                <p class="categoryN">
                {{$product->categoryname}}

                </p>


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