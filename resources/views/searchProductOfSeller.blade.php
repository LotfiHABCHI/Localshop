@extends('layouts.base')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>{{ $products[0]->storename }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="{{asset('resources/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      *, ::before, ::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  font-style: normal;
  background: rgb(255, 248, 248);
}

h1 {
    text-align: center;
    padding: 35px 0;
    font-size: 40px;
    color:rgb(57, 58, 58);
}




.header{
  display: flex;
  width: 100%;
}

#co{
  padding:2%;
  float: left;
  display: flex;
}

#panier{
  padding:2%;
  float: right;
  display: flex;
}

#logo{
  margin-left: auto;
  margin-right: auto;
  display: flex;
}

hr{
  width:100%;
  color: rgb(57, 58, 58);
}

.footer_hr{
  width:100%;
  color: rgb(57, 58, 58);
  margin-top: 3%;
}


.core{
  height: 70%;
}



.category li{
  display: inline-block;
  height: 12%;
  width: 12%;
}




.seller{
  display: flex;
  border: solid 2px red;
}

.human{
  display: inline-block;
  border: solid 2px blue;
  margin:1%;
  width: 40%;
  height: auto;
}

.seller_title{
  font-size: 25px;
  text-align: center;
  color: rgb(57, 58, 58);
}

.item{
  display: inline-block;
  border: solid 2px green;
  margin:1%;
  width: 100%;
  height: auto;
}

.nb_item{
  border: solid 2px yellow;
  margin:1%;
  height: auto;
}

.seller_description{
  text-align: justify;
  color: rgb(57, 58, 58);
}





.footer{
  display: flex;
  padding: 2%;
}

#propos, #faq, #mention, #contact, #cci{
  padding-left: 5%;
  display: inline-block;
}

#cci{
  color: rgb(57, 58, 58);
}

a {
  outline: none;
  text-decoration: none;
  padding: 2px 1px 0;
}

.footer a:link {
  color: rgb(108, 115, 116);
}

.footer a:visited {
  color: rgb(108, 115, 116);
}

.footer a:focus {
  border-bottom: 1px solid;
  background: rgb(57, 58, 58);
}

.footer a:hover {
  border-bottom: 1px solid;
  background: rgba(119, 126, 127, 0.452);
}

.footer a:active {
  background: rgb(57, 58, 58);
  color:rgba(119, 126, 127, 0.452);
}
    </style>

    
  </head>
  <body>
    


<main>
@section('content')

@if ($errors->any())
	<div class="alert alert-warning">
	Ce vendeur ne propose pas de {{old('searchInStore')}} &#9785;
	</div>
	@endif


<div classe="search"> 
      <form action="{{route('searchProductInStore',  ['sellerId'=>$products[0]->sellerid])}}" >
      @csrf
        <div class="form-group">
            <input type="search" id="searchInStore" name="searchInStore" value="{{old('searchInStore')}}"
                  aria-describedby="searchInStore_feedback" class="form-control @error('searchInStore') is-invalid @enderror"> 
            @error('searchInStore')
            <div id="searchInStore_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
      </form>
    </div>


<div class="container">
  

<div id="core_category">
    <nav class="nav d-flex justify-content-between"> 
      
      @foreach ($categories as $category)
          <div class="col-1">
              <article >
                     <a href="{{route('showProductsOfCategory',['id'=>$category->categoryid])}}"> <img class="card-img-top" src="{{asset('images/'.$category->categoryimage)}}"></a> 
              </article>
          </div>   
        @endforeach
      </nav>
    </div>
</div>

<div class="seller">
  <div class="human">

    <p class="seller_title">{{ $products[0]->storename }}</p>
    <img src="">
    <div class="nb_item">
    
    </div>
    <p class="seller_description">Bonjour, je vends des supers legumes Bonjour, je vends des supers legumes Bonjour, je vends des supers legumes</p>
  
  </div>
 
  <div class="item" class="album py-5 bg-light"> <!-- ici ça ne prend que la 2eme class -->

    <div class="container-fluid">
      <div class="row row-cols ">
      @foreach ($products as $product)
      <div class="card shadow-sm">
      <img class="card-img-top" src="{{asset('storage/images/'.$product->productimage)}}" >

            <div class="card-body">
              <p class="card-text"><a href="{{route('product',['id'=>$product->productid])}}">{{ $product->productname }} <a> </p>
              {{ number_format($product->productprice,2) }}€
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                
                <form  action="{{route('cart.add', ['id'=>$product->productid])}}" method="POST" id="add_cart">
                @csrf
                <label for="quantity"> </label>
                <input type="number" value="1" class="form-control" id="quantity" name="quantity" min="0">
                </form>

                </div>
              </div>
            </div>
          </div>


            
          @endforeach
          
      </div>
    </div>
  </div>
  
</div>

</main>

@endsection


      

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <script src= "{{asset('resources/js/bootstrap.bundle.min.js')}}"  integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      
  </body>
</html>








