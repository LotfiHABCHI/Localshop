@extends('layouts.base')
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.80.0">
	<title>{{$productName[0]->productname}}</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">



	<!-- Bootstrap core CSS -->
	<link href="{{asset('resources/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
	 crossorigin="anonymous">

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
  
* {
	box-sizing: border-box;
}

.wrapper {
	display: flex;
	justify-content: center;
	align-items: center;
	font-family: Montserrat;
	background: transparent;
	width: 100%;
	height: 100vh;
  
  
}

.outer {
	position: relative;
	background: #fff;
	height: 600px;
	width: 900px;
	overflow: hidden;
	display: flex;
	align-items: center;
  transition: 0.3s ease-out;
   box-shadow: 0 3px 15px rgba(0, 0, 0, 0.7); 
   /*margin-left: 110px;*/
   margin : 0 auto 0 110px;
   
}

/*img {
	position: absolute;
	top: 190px;
	right:  30px;
  
	z-index: 0;
	animation-delay: 0.5s;
}*/

.imgtomate{
  position: absolute;
	top: 190px;
	right:  90px;
  
	z-index: 0;
	animation-delay: 0.5s;

}

.content {
	animation-delay: 0.3s;
	position: relative;
	left: 20px;
	z-index: 3;
  text-align: center;
  margin : 0 auto 0 110px;
}

h1 {
	color: #111;
}

p {
	width: 350  px;
	font-size: 13px;
	line-height: 1.4;
	color: #aaa;
	margin: 20px 0;
	
}

.bg {
	display: inline-block;
	color: #fff;
	background: rgb(30, 236, 99);
	padding: 5px 10px;
	border-radius: 50px;
	font-size: 4em;
  align-items : center;
}
.button {
	width: fit-content;
	height: fit-content;
	margin-top: 10px;
  margin-left: 150px;
	
	
	
}

.button a {
	display: inline-block;
	overflow: hidden;
	position: relative;
	font-size: 20px;
	color: #111;
	text-decoration: none;
	padding: 10px 15px;
	border: 1px solid #aaa;
	font-weight: bold;
  background: rgb(30, 236, 99);
	
	
}

.button a:after{
	content: "";
	position: absolute;
	top: 0;
	right: -10px;
	width: 0%;
	background: #111;
	height: 100%;
	z-index: -1;
	transition: width 0.3s ease-in-out;
	transform: skew(-25deg);
	transform-origin: right;
}

.button a:hover:after {
	width: 150%;
	left: -10px;
	transform-origin: left;
	
}

.button a:hover {
	color: #fff;
	transition: all 0.5s ease;
}


.button a:nth-of-type(1) {
	border-radius: 50px 0 0 50px;
	border-right: none;
}

.button a:nth-of-type(2) {
	border-radius: 0px 50px 50px 0;
}

.cart-icon {
	padding-right: 8px;
	
}



.boxe1{

    background-color: transparent;
    height: 60px;
    width: 500px;
    text-align: center;
    padding: 15px;
    border: dashed black;
    
}
.vendeur{
  display: inline-block;
  border: solid red;
	background: #fff;
	height: 600px;
	width: 400px;
	overflow: hidden;

	align-items: center;
  transition: 0.3s ease-out;
   box-shadow: 0 3px 15px rgba(0, 0, 0, 0.7); 
   margin-left: 10px;

}
.imageV{
  height: 400px;
  width: 400px; 
  display: block;
  border: rgba(0, 0, 0, 0.7) solid;
}
.Descr{
  height: 200px;
  width: 400px;
  border: rgba(0, 0, 0, 0.7) solid;
  padding: 5px;
}
	</style>


</head>

<body>

	

<main>
@section('content')








    <div class="container">
    

    
        <nav class="nav d-flex justify-content-between">
        
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
    
        </nav>
   
    </div>

@foreach($products as $product)
    <div class="wrapper">
  <div class="vendeur"> 
    <div class="imageV">
      <img  src="img_avatar5.png" alt="" width="400px" height="400px">
    </div>
    <div class="Descr">
      <h2><center>{{$product->storename}}</center></h2>
      <h3> Adresse :{{$product->sellernumstreet}} {{$product->sellernamestreet}} </h3>
      <h3> Téléphone : {{$product->sellerphone}}</h3>
      <h3> Description :{{$product->sellerdescription}}</h3>
    </div>
    
  </div>

  


	<div class="outer">
		<div class="content animated fadeInLeft">
			<span class="bg animated fadeInDown">Légumes</span>
      
			<h1> {{$product->productname}}</h1>
      <div>
  <img  src="{{asset('storage/images/'.$product->productimage)}}" alt="image" width="250px"   class="animated fadeInRight">

  </div>
      
			<p>{{$product->productinfo}}</p>

      <form class="d-flex justify-content-between align-items-center mr-1" action="{{route('cart.add', ['id'=>$product->productid])}}" method="POST" id="add_cart">
                      @csrf
                      <label for="quantity"></label>
                      <input type="number" value="1" class="form-control" id="quantity" name="quantity" min="0">
                      @if (session()->has('alluser'))
                
                        <button type="submit" form="add_cart" class="btn btn-sm btn-outline-secondary"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="30" width="30" /></button>
              
                      @else 
                        <a href="{{route('seller.login')}}"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39" /></a> 
                      @endif
                    </form>
			
			<div class="button">
				<a href="#">{{$product->productprice}}€</a><a class="cart-btn" href="#">Ajouter au panier</a>
			</div>
			
		</div>
    <div class="imgtomate">
		
  </div>
	</div>
	
</div>
@endforeach
















<!-- @foreach($products as $product)
    <div class="box1">
           <p class="p1"> <img src="{{asset('storage/images/'.$product->productimage)}}" alt="image"></p>
        </div>
        <div class="box2">
            <p class="p2"> 
            <a href="{{route('product',['id'=>$product->productid])}}"> {{ $product->productname}} </a>
            </p>

            <p class="p3"> 
            {{ $product->productinfo}}
            </p>

         </div>  

         <div class="box3">
            <div class="div1"> 
            {{ $product->productprice}}
            </div>

            <div class="div2"> 
            <div>
                    <form class="d-flex justify-content-between align-items-center mr-1" action="{{route('cart.add', ['id'=>$product->productid])}}" method="POST" id="add_cart">
                      @csrf
                      <label for="quantity"></label>
                      <input type="number" value="1" class="form-control" id="quantity" name="quantity" min="0">
                      @if (session()->has('alluser'))
                
                        <button type="submit" form="add_cart" class="btn btn-sm btn-outline-secondary"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="30" width="30" /></button>
              
                      @else 
                        <a href="{{route('seller.login')}}"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39" /></a> 
                      @endif
                    </form>
                  </div>
            </div>
            
            

         </div> 

         <article class="box4">
             <h1><center><a href="{{route('showProductOfSeller',['id'=>$product->sellerid])}}">{{ $product->storename}}</a></center></h1>
             <h2> Adresse : {{ $product->sellernumstreet}} {{$product->sellernamestreet}}</h2>
             <h2> Téléphone : {{ $product->sellerphone}}</h2>
            
         </article>
         @endforeach
         -->
<!--
    @foreach($products as $product)
  <div class="product-card">
  
      <div class="badge">
          {{ $product->categoryid}}
      </div>

      <div class="product-tumb">
          <img src="{{asset('storage/images/'.$product->productimage)}}" alt="image">
      </div>

      <div class="product-details">
          <span class="product-catagory"> <a href="{{route('product',['id'=>$product->productid])}}"> {{ $product->productname}} </a></span>
          <h4>	<a href="{{route('showProductOfSeller',['id'=>$product->sellerid])}}">{{ $product->storename}}</a></h4>
          <p>{{ $product->productinfo}}</p>
          <div class="product-bottom-details">
              <div class="product-price">
                @if($product->categoryid==1 or $product->categoryid==2 or $product->categoryid==4)
                  <span>{{ number_format($product->productprice,2) }}€/kg</span>
                  @else
                  <span>{{ number_format($product->productprice,2) }}€</span>
                  @endif
                  
                
              </div>
              <div>
                    <form class="d-flex justify-content-between align-items-center mr-1" action="{{route('cart.add', ['id'=>$product->productid])}}" method="POST" id="add_cart">
                      @csrf
                      <label for="quantity"></label>
                      <input type="number" value="1" class="form-control" id="quantity" name="quantity" min="0">
                      @if (session()->has('alluser'))
                
                        <button type="submit" form="add_cart" class="btn btn-sm btn-outline-secondary"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="30" width="30" /></button>
              
                      @else 
                        <a href="{{route('seller.login')}}"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39" /></a> 
                      @endif
                    </form>
                  </div>
              
          </div>
      </div>
    
  </div>
  @endforeach
  -->

   <!-- @foreach($products as $product)
        <div class="col-md-3">

            <div class="card mb-4 shadow-sm">

            <img class="card-img-top" src="{{asset('storage/images/'.$product->productimage)}}" >
            <div class="card-body">
            <h4><a href="{{route('showProductOfSeller',['id'=>$product->sellerid])}}">{{ $product->storename}}</a></h4><h5>{{ $product->productname }}</h5>    
            <p> {{ $product->productinfo}}</p>
                @if($product->categoryid==1 or $product->categoryid==2 or $product->categoryid==4)
                <p>{{ number_format($product->productprice,2) }}€/kg</p>
                @else
                <p>{{ number_format($product->productprice,2) }}€</p>
                @endif
                <div >
                
                <form class="d-flex justify-content-between align-items-center mr-1" action="{{route('cart.add', ['id'=>$product->productid])}}" method="POST" id="add_cart">
                @csrf
                <label for="quantity">Quantité</label>
                <input type="number" value="1" class="form-control" id="quantity" name="quantity" min="0">
                @if (session()->has('alluser'))
           
                <button type="submit" form="add_cart" class="btn btn-sm btn-outline-secondary"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="30" width="30" /></button>
        
                @else 
                <a href="{{route('seller.login')}}"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39" /></a> 
                @endif
                </form>
                 </div>
            </div>
        </div>
     </div>
     @endforeach -->

     
        
@endsection




</main>



    <script src= "{{asset('resources/js/bootstrap.bundle.min.js')}}"  integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      
  </body>
</html>