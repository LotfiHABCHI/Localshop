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
            fordddddddddddddddd
            <li>
              <a href="">
                <img src="">
              </a>
            </li>
            fin
          </ul>
  </div>

<div id="core_seller" >

  <div class="search"> 
    <form method="GET" action="{{route('searchProductInStore',['sellerId'=>$seller[0]->sellerid])}}">
      @csrf

      <div class="form-group">
        <input type="search" id="inputSearch" name="searchInStore" placeholder="Que recherchez-vous ?">
        <input id="btnSearch" name="search" type="submit" value="Valider">
        @error('search')
        <div id="search_feedback" class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

    </form>
  </div>

<div class="store">
@if((session()->get('alluser')['roleid']==1) && (session()->get('alluser')['allusersellerid']==$seller[0]->sellerid))
<div class="seller">
    <h2>{{$seller[0]->storename}}</h2>
    <div id="img_seller">
      <img  src="{{ asset('storage/images/'.$seller[0]->sellerimage) }}">
    </div>
    <div id="divAddDescription">
            <p>Modifier votre description ci-dessous :</p>
            <form id="formDescription" method="POST" action="{{route('desc.edit')}}">
            @csrf
                <textarea id="txtdescription" name="txtdescription"></textarea>
                <button id="btnValider" type="submit">VALIDER</button>
            </form>
        </div>
  
    <div class="nb_item">
        <p>Nombre de produits en vente : {{$count}}</p>
    </div>
</div>

<div class="products">
@foreach($details as $detail)
  <div class="product_card">
    <form id="delete" method="POST" action="{{route('delete_product.post',['id'=>$detail->productid])}}">
    @csrf
      <input id="inputDelete" value="&#10060" type="submit">
    </form>

    <div class="img">
      <a href="{{route('product',['id'=>$detail->productid, 'sellerId'=>$seller[0]->sellerid])}}">
        <img src="$">
      </a>
    </div>

    <hr>
    <div class="txtproduct">
      <p class="categoryN">
      {{$detail->categoryname}}
      </p>

      <p class="productN">
        <a href="{{route('product',['id'=>$detail->productid, 'sellerId'=>$seller[0]->sellerid])}}">
          {{$detail->productname}}
        </a>
      </p>
      
      
      <div class="info_product">{{$detail->productinfo}}</div>
      <div class="price_product">{{number_format($detail->productprice,2)}}€/pièce</div>
    </div>
  </div>
@endforeach

  <div class="product_cardAdd">
    <a id="addP" href="addProduct.irfref">&#10010</a>
  </div>

  
</div>

</div>

</div>
<div>
</div>

@else
<div>
  Vous n'avez pas accès a cette page !
</div>
@endif

@endsection


@section('script')
<script src="{{ asset('js/seller/seller.js') }}"></script>
@endsection