@extends('layouts.base')

@section('title')
{{$seller[0]->storename}}
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
              <img src="{{asset('images/'.$category->categoryimage)}}">
              </a>
            </li>
            @endforeach
          </ul>
  </div>

<div id="core_seller" >

  <div class="search"> 
    <form  action="{{route('searchProductInStore',['sellerId'=>$details[0]->sellerid])}}">
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
        <h2>{{$details[0]->storename}}</h2>
        <div id="img_seller">
          <img  src="{{ asset('storage/images/'.$details[0]->sellerimage) }}">
        </div>
        <div id="divAddDescription">
            <p>{{$details[0]->sellerdescription}}</p>
        @if(session()->has('alluser') && session()->get('alluser')['roleid']==1)
            <a id="btnEdit" href="{{route('add_description.show', ['id'=>$details[0]->sellerid])}}"> <!-- route add_description.show -->
                Editer votre description
            </a>
        @endif
        </div>
      
        <div class="nb_item">
           
            <p> Adresse :{{$details[0]->sellernumstreet}} {{$details[0]->sellernamestreet}} </p>
            <p> Téléphone : {{$details[0]->sellerphone}}</p>
            <p> Nombre de produits en vente : {{$count}}</p>
        </div>
    </div>

    <div class="products">
@if((session()->has('alluser') && session()->get('alluser')['roleid']==1) && (session()->get('alluser')['allusersellerid']==$details[0]->sellerid))
  @foreach($details as $detail)
      <div class="product_card">
        <form id="delete" methode="POST" action="{{route('delete_product.post',['id'=>$detail->productid])}}">  <!-- route('delete_product.post',['id'=>$product->productid]) -->
        @csrf
          <input id="inputDelete" value="&#10060" type="submit">
        </form>

        <div class="img">
          <a href="{{route('product',['id'=>$detail->productid, 'sellerId'=>$detail->sellerid])}}">
          <img src="{{asset('storage/images/'.$detail->productimage)}}" alt="image">
          </a>
        </div>

        <hr>
        <div class="txtproduct">
          <p class="categoryN">
          {{$detail->categoryname}} 
          </p>

          <p class="productN">
            <a href="{{route('product',['id'=>$detail->productid, 'sellerId'=>$detail->sellerid])}}">
              {{$detail->productname}}
            </a>
          </p>
          
          
          <div class="info_product">{{$detail->productinfo}}</div>
          <div class="price_product">{{number_format($detail->productprice,2)}}€/pièce</div>
        </div>
      </div>
  @endforeach

      <div class="product_cardAdd">
        <a id="addP" href="{{ route('addProduct') }}">&#10010</a>
      </div>

@else
@foreach ($details as $detail)
      <div class="product_card">
      
        <div class="imgC">
          <a href="{{route('product',['id'=>$detail->productid, 'sellerId'=>$detail->sellerid])}}">
             <img src="{{asset('storage/images/'.$detail->productimage)}}" alt="image">
          </a>
        </div>

        <hr>
        <div class="txtproduct">
          <p class="categoryN">
          {{$detail->categoryname}}

          </p>

          <p class="productN">
            <a href="{{route('product',['id'=>$detail->productid, 'sellerId'=>$detail->sellerid])}}">
            {{$detail->productname}}
            </a>
          </p>
          
          
          <div class="info_product">{{$detail->productinfo}}</div>
          <div class="price_product">{{number_format($detail->productprice,2)}}€/pièce</div>
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