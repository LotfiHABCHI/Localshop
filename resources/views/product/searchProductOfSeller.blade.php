@extends('layouts.base')

@section('title')
'Page Producteur'
@endsection

@section('css')
  @parent
  <link href="{{ asset('css/sellers/seller.css') }}" rel="stylesheet" type="text/css" />
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

<div id="core_seller" >

  <div class="search"> 
    <form method="GET" action="{{route('searchProductInStore',['sellerId'=>$products[0]->sellerid])}}">
      @csrf
      @if ($errors->any())
	<div class="alert alert-warning">
	Ce vendeur ne propose pas de {{old('searchInStore')}} &#9785;
	</div>
	@endif

      <div class="form-group">
        <input type="search" id="inputSearch" name="searchInStore" placeholder="Que recherchez-vous ?"> 
        @error('searchInStore')
        <div id="searchInStore_feedback" class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        
      </div>
      <button type="submit" id="btnSearch">&#x1F50D;</button>

    </form>
  </div>


  <div class="store">

    <div class="seller">
        <h2>{{$products[0]->storename}}</h2>
        <div id="img_seller">
          <img  src="{{ asset('storage/images/'.$products[0]->sellerimage) }}">
        </div>
        <div id="divAddDescription">
            <p>{{$products[0]->sellerdescription}}</p>
        @if(session()->get('alluser')['roleid']==1)
            <a id="btnEdit" href="#"> <!-- route add_description.show -->
                Editer votre description
            </a>
        @endif
        </div>
      
        <div class="nb_item">
        </div>
    </div>

    <div class="products">
@if((session()->get('alluser')['roleid']==1) && (session()->get('alluser')['allusersellerid']==$products[0]->sellerid))
  @foreach($products as $product)
      <div class="product_card">
        <form id="delete" methode="POST" action="{{route('delete_product.post',['id'=>$product->productid])}}">  <!-- route('delete_product.post',['id'=>$product->productid]) -->
        @csrf
          <input id="inputDelete" value="&#10060" type="submit">
        </form>

        <div class="img">
          <a href="{{route('product',['id'=>$product->productid, 'sellerId'=>$product->sellerid])}}">
          <img src="{{asset('storage/images/'.$product->productimage)}}" alt="image">
          </a>
        </div>

        <hr>
        <div class="txtproduct">
          <p class="categoryN">
          categorie
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

      <div class="product_cardAdd">
        <a id="addP" href="{{ route('addProduct') }}">&#10010</a>
      </div>

@else
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
          categorie
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
@endif

      
    </div>

  </div>

</div>
@endsection


@section('script')
<script src="{{ asset('js/seller/seller.js') }}"></script>
@endsection