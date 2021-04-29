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
            <img src="{{asset('storage/images/'.$category->categoryimage)}}">
              </a>
            </li>
            @endforeach
          </ul>
  </div>

<div id="core_seller" >



<div class="search"> 
<form  action="{{route('searchProductInStore',['sellerId'=>$seller[0]->sellerid])}}">
      @csrf
      @if ($errors->any())
      <div class="alert alert-warning">
        Aucun de nos commerçants ne propose de {{old('searchInStore')}} &#9785;
      </div>
      @endif

      <div class="form-group">
        <input type="search" id="inputSearch" name="searchInStore" placeholder="Que recherchez-vous ?"> 
        @error('searchInStore')
        <div id="searchInStore_feedback" class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        <button type="submit" id="btnSearch">&#x1F50D;</button>

      </div>

    </form>
  </div>


  <div class="store">

    <div class="seller">
        <h2>{{$seller[0]->storename}}</h2>
        <div id="img_seller">
          <img  src="{{ asset('storage/images/'.$seller[0]->sellerimage) }}">
        </div>
        <div id="divAddDescription">
            <p>{{$seller[0]->sellerdescription}}</p>
        @if(session()->has('alluser') && session()->get('alluser')['roleid']==1 && (session()->get('alluser')['allusersellerid']==$seller[0]->sellerid) )
            <a id="btnEdit" href="{{route('add_description.show', ['id'=>$seller[0]->sellerid])}}"> <!-- route add_description.show -->
                Editer votre description
            </a>
        @endif
        </div>
      
        <div class="nb_item">
           
            <p> Adresse :{{$seller[0]->sellernumstreet}} {{$seller[0]->sellernamestreet}} </p>
            <p> Téléphone : {{$seller[0]->sellerphone}}</p>
            <p> Nombre de produits en vente : {{$count}}</p>
        </div>
    </div>

    <div class="products">
@if((session()->has('alluser') && session()->get('alluser')['roleid']==1) && (session()->get('alluser')['allusersellerid']==$seller[0]->sellerid))
  @foreach($details as $detail)
      <div class="product_card_own">
        <form id="delete" method="POST" action="{{route('delete_product.post',['id'=>$detail->productid])}}">  <!-- route('delete_product.post',['id'=>$product->productid]) -->
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
          <div class="quantity_update">
        <form action="{{ route('stock.update', $detail->productid) }}" method="POST" id="stock_update">
                    @csrf
                      <input id="inputSearch"  name="stock" type="number" style="height: 2rem" min="1" max="99" value="{{ $detail->productquantity }}">
                      <button  id="stock_update"> &#10004 </button>                  
                  </form> 
      </div>
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