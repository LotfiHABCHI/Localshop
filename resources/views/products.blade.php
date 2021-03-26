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
  
body{
      font-family: 'Roboto', sans-serif;
  }
  a{
      text-decoration: none;
  }
  .product-card {
    display: inline-block;
      width: 380px;
      position: relative;
      box-shadow: 0 2px 7px #dfdfdf;
      margin: 50px auto;
      background: #fafafa;
      text-align: center;
  }
  
  .badge {
      /*position: absolute;*/
      left: 0;
      top: 20px;
      text-transform: uppercase;
      font-size: 13px;
      font-weight: 700;
      background: green;
      color: #fff;
      padding: 3px 10px;
  }
  
  .product-tumb {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 300px;
      padding: 50px;
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

  .box1{
           
           display: inline-block;
           text-align: center;
           position: absolute;
           
           
           
           
       }
       .p1{
            background-color: transparent;
           height: 350px;
           width: 500px;
           text-align: center;
           padding: 15px;
           border: 1px solid black;
           margin: 30px;
           

       }
       .box2{
           
           display: inline-block;
           text-align: center;
           margin-left: 600px;
          
           
           
       }
       .p2{
           background-color: transparent;
           display: block;
           height: 150px;
           width: 400px;
           text-align: center;
           padding: 15px;
           border: 1px solid black;
           margin: 30px;
           
           
           
       }
       .p3{
           background-color: transparent;
           display: block;
           height: 150px;
           width: 400px;
           text-align: center;
           padding: 15px;
           border: 1px solid black;
           margin: 30px;
           
           
           
       }

       .box3{
            
           display: block;
           text-align: center;
           float: right;
           margin-right: 300px;
           margin: 30px;
          
           
           

       }

       .div1{
           background-color: transparent;
           display: block;
           height: 100px;
           width: 350px;
           text-align: center;
           padding: 15px;
           border: 1px solid black;
           

       }

       .div2{
           background-color: transparent;
           display: block;
           height: 100px;
           width: 350px;
           text-align: center;
           padding: 15px;
           border: 1px solid black;
           

       }

       .div3{
           background-color: transparent;
           display: block;
           height: 100px;
           width: 350px;
           text-align: center;
           padding: 15px;
           border: 1px solid black;
           

       }



       
       .box4{
           background-color: transparent;
           width: 800px;
           height: 250px;
           margin-left: 40px;
           padding: 15px;
           border: 1px solid black;
           display: block;
     margin: 30px;
       }

       /*-----------------button----------------*/

               .styled {
                   border: solid;
                   height: 100px;
                   width: 350px;
               }
               .styled {
           
           line-height: 2.5;
           padding: 0 20px;
           font-size: 1rem;
           text-align: center;
           color: #fff;
           text-shadow: 1px 1px 1px #000;
           border-radius: 10px;
           background-color: rgb(155, 228, 177);
           background-image: linear-gradient(to top left,
                                           rgba(0, 0, 0, .2),
                                           rgba(0, 0, 0, .2) 30%,
                                           rgba(0, 0, 0, 0));
           box-shadow: inset 2px 2px 3px rgba(255, 255, 255, .6),
                       inset -2px -2px 3px rgba(0, 0, 0, .6);
       }

       .styled:hover {
           background-color: rgb(14, 9, 9);
       }

       .styled:active {
           box-shadow: inset -2px -2px 3px rgba(255, 255, 255, .6),
                       inset 2px 2px 3px rgba(0, 0, 0, .6);
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
            <!--
            <div class="div3">
                <button class="styled"> Ajouter au Panier</button>
            </div>
            -->

         </div> 

         <article class="box4">
             <h1><center><a href="{{route('showProductOfSeller',['id'=>$product->sellerid])}}">{{ $product->storename}}</a></center></h1>
             <h2> Adresse : {{ $product->sellernumstreet}} {{$product->sellernamestreet}}</h2>
             <h2> Téléphone : {{ $product->sellerphone}}</h2>
            
         </article>
         @endforeach
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

     <body>
        
@endsection




</main>



    <script src= "{{asset('resources/js/bootstrap.bundle.min.js')}}"  integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      
  </body>

  @foreach($products as $product)
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
                                            @if (session()->has('alluser'))
                
                      <div class="div3">
                <button class="styled"> Ajouter au Panier</button>
            </div>              
                      @else 
                        <a href="{{route('seller.login')}}"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39" /></a> 
                      @endif
                    </form>
                  </div>
            </div>
            <!--
            <div class="div3">
                <button class="styled"> Ajouter au Panier</button>
            </div>
            -->

         </div> 

         <article class="box4">
             <h1><center><a href="{{route('showProductOfSeller',['id'=>$product->sellerid])}}">{{ $product->storename}}</a></center></h1>
             <h2> Adresse : {{ $product->sellernumstreet}} {{$product->sellernamestreet}}</h2>
             <h2> Téléphone : {{ $product->sellerphone}}</h2>
            
         </article>
         @endforeach
</html>