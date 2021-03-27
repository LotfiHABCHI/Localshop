@extends('layouts.base')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Accueil</title>


  

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

.core hr{
  width:50%;
  color: rgb(57, 58, 58);
  margin: 0 auto 0 auto;
}








.footer_hr{
  width:100%;
  color: rgb(57, 58, 58);
  margin-top: 3%;
}

.footer{
  display: flex;
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

body{
      font-family: 'Roboto', sans-serif;
  }
  a{
      text-decoration: none;
  }

  .products{
    text-align: center;
    
  }
  .product-card {
   
    display: inline-block;
      width: 280px;
      position: relative;
      box-shadow: 0 2px 7px #dfdfdf;
      margin: 50px auto;
      background: #fafafa;
      text-align: center;
  }
  
  .badge {
      position: absolute;
      left: 0;
      top: 30px;
      text-transform: uppercase;
      font-size: 13px;
      font-weight: 700;
      background: green;
      color: #fff;
      padding: 3px 10px;
  }
  .product-card{
    border-radius: 25px;
  }
  
  .product-tumb {
      border-radius : 25px 25px 0px 0px;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 250px;
     /* padding: 1px;*/
      background: #f0f0f0;
  }
  
  .product-tumb img {
    
      max-width: 100%;
      max-height: 100%;
  }
  
  .product-details {
      padding: 30px;
  }
  
  .product-catagory {
      display: block;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      color: #ccc;
      margin-bottom: 18px;
  }
  
  .product-details h4 a {
      font-weight: 500;
      display: block;
      margin-bottom: 18px;
      text-transform: uppercase;
      color: #363636;
      text-decoration: none;
      transition: 0.3s;
  }
  
  .product-details h4 a:hover {
      color: #fbb72c;
  }
  
  .product-details p {
      font-size: 15px;
      line-height: 22px;
      margin-bottom: 18px;
      color: #999;
  }
  
  .product-bottom-details {
      overflow: hidden;
      border-top: 1px solid #eee;
      padding-top: 20px;
      text-align: center  ;
  }
  
  .product-bottom-details div {
      float: left;
      width: 50%;
      text-al;
      
  }
  
  .product-price {
      font-size: 30px;
      color: #fbb72c;
      font-weight: 400;
      text-align: center;
     
  }
  
  .product-price small {
      font-size: 80%;
      font-weight: 400;
      text-decoration: line-through;
      display: inline-block;
      margin-right: 5px;
  }
  
  .product-links {
      text-align: right;
  }
  
  .product-links a {
      display: inline-block;
      margin-left: 5px;
      color: #e1e1e1;
      transition: 0.3s;
      font-size: 17px;
  }
  
  .product-links a:hover {
      color: #fbb72c;
  }
    </style>

    
  </head>
  <body>
    
<header>
<hr></hr>
  @section('content')
 
  
    
  
</header>

<main>

<!--<div class="container">  -->
  
<div class="core">

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


   



    <div classe="search"> 
      <form  action="{{route('searchProduct')}}"> <!-- ['id'=>sellers[0]->sellerid])-->
      @csrf
        <div class="form-group">
            <input type="search" id="search" name="search" value="{{old('search')}}"
                  aria-describedby="search_feedback" class="form-control @error('search') is-invalid @enderror"> 
            @error('search')
            <div id="search_feedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
      </form>
    </div>

<form naem="sortProducts" id="sortProducts" >
@csrf
<label>Trier par</label>
  <select name="sort" id="sort">
    <option value="lowestFirst">Prix croissant</option>
  </select>

</form>
   
  
 
    

<div class="products">
    @foreach($details as $detail)
  <div class="product-card">
  
      <div class="badge">
          {{ $detail->category}}
      </div>

      <div class="product-tumb">
          <img src="{{asset('storage/images/'.$detail->productimage)}}" alt="image">
      </div>

      <div class="product-details">
          <span class="product-catagory"> <a href="{{route('product',['id'=>$detail->productid])}}"> {{ $detail->productname }}</a></span>
          <h4>	<a href="{{route('showProductOfSeller',['id'=>$detail->sellerId])}}">{{ $detail->store}}</a></h4>
          <p>{{ $detail->productinfo }} </p>
          <div class="product-bottom-details">
              <div class="product-price">
                  {{ number_format($detail->productprice,2) }}€ 
              </div>
              
          </div>
      </div>
    
  </div>
  @endforeach
</div>

  
</div>

    
  
</main>




      @endsection
      

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script src= "{{asset('resources/js/bootstrap.bundle.min.js')}}"  integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      
  </body>
</html>


