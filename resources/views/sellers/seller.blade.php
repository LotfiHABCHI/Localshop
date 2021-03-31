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
    for
    <li>
      <a href="#">
        <img src="#">
      </a>
    </li>
    fin
  </ul>
</div>

<div id="core_seller" >



  <div class="search"> 
    <form method="" action="">
      @csrf

      <div class="form-group">
        <input type="search" id="inputSearch" name="search" placeholder="Que recherchez-vous ?">
        <input id="btnSearch" name="search" type="submit" value="Valider">
        err
          <div id="search_feedback" class="invalid-feedback">
            mess
          </div>
        fin
      </div>

    </form>
  </div>


  <div class="store">

    <div class="seller">
      <h2>storename</h2>

      <div id="img_seller">
        <img  src="{{ asset('storage/image/asperge.jpg') }}">
      </div>
      
      <div id="divDescription">
        <a href="#"> <!-- route add description -->
          <button id="btnDescription" type="button">EDITER</button>
        </a>
      </div>
      
      <div class="nb_item">
      <p>Nombre de produits en vente : {{$count}}</p>
      </div>
      
    </div>

    
    <div class="products">
      for vendeur  
      <div class="product_card">
      
        <form id="delete" methode="post" action="">
          <input id="inputDelete" value="&#10060" type="submit">
        </form>

        <div class="img">
          <a href="">
            <img src="{{ asset('storage/image/asperge.jpg') }}">
          </a>
        </div>

        <hr>
        <div class="txtproduct">
          <p class="categoryN">
              Fruits
          </p>

          <p class="productN">
            <a href="#">
              POMME
            </a>
          </p>
          
          
          <div class="info_product">bio, français</div>
          <div class="price_product">0,5 / pièce</div>
        </div>

      </div>
      fin

      for client 
      @foreach($details as $detail)
      <div class="product_card">

        <div class="imgC">
          <a href="">
            <img src="{{ asset('storage/images/'. $detail->productimage) }}">
          </a>
        </div>

        <hr>
        <div class="txtproduct">
          <p class="categoryN">
              Fruits
          </p>

          <p class="productN">
            <a href="#">
              {{$detail->productname}}
            </a>
          </p>
          
          
          <div class="info_product">{{$detail->productinfo}}</div>
          <div class="price_product">{{number_format($detail->productprice,2)}} €/pièce</div>
        </div>

      </div>
      @endforeach

</div>

  
      
      
  </div>

</div>

@endsection


@section('script')
<script src="{{ asset('js/seller/seller.js') }}"></script>
@endsection