@extends('layouts.base')
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.80.0">
	<title>Panier</title>

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
	</style>


</head>

<body>

	@section('content')

<main>

    <div class="container">
   
    @if ($errors->any())
	<div class="alert alert-warning">
		{{$errors}}
	</div>
	@endif
     
        <table class="table table-borderd table-responsive-sm">
            <thead>
                <tr>
                    <td>Produit</td>
                    <td>Quantité</td>
                    <td>Prix unitaire</td>
                    <td>Prix total</td>
                    <td>
                      <form action="{{ route('cart.clear') }}" method="POST" id="cart_clear">
                      @csrf
                      <div class="d-flex justify-content-between align-items-center">
                      <button class="btn btn-outline-danger" id="cart_clear"> Vider </button>
                      </div>
                      </form>
                    </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($content as $product)
                    <tr>
                        <td>
                            <img class="card-img-top" src="{{asset('storage/images/'.$product->attributes['image'])}}" >
                            {{ $product->name }}     

                        </td>
                        <td>
                        <form action="{{ route('cart.update', $product->id) }}" method="POST" id="cart_update">
                    @csrf
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="col m2 s12" >
                      <input name="quantity" type="number" style="height: 2rem" min="1" max="99" value="{{ $product->quantity }}">
                      <button class="btn btn-sm btn-outline-tertiary" id="cart_update"> &#10004 </button>
                    </div>
                   
                  </form>                        
                  </td>
                        <td> 
                            {{number_format($product->price,2)}}€
                        </td>
                        <td>
                           <strong> {{number_format($product->price * $product->quantity,2)}}€ </strong>
                        </td>             
                        <td>
                        <form action="{{ route('cart.destroy', $product->id) }}" method="POST" id="cart_destroy">
                    @csrf                    
                    </div>
                    <button class="btn btn-sm btn-outline-tertiary" id="cart_destroy"> &#10060</button>
                  </form>       
                       
                        </td>      
                    </tr>
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    @if($count==0)
                    <td>  Aucun produit</td>
                    @elseif($count==1)
                    <td>{{$count}} produit</td>
                    @else
                    <td> {{$count}} produits</td>
                    @endif
                    <td></td>
                    <td> Sous total</td>
                    <td> {{number_format($total, 2)}}€</td>
                </tr>
            </tfooter>

        </table>

        <form action="{{ route('order.post') }}" method="POST" id="order">
        @csrf
        <button type="submit" class="btn btn-sm btn-outline-secondary" id="buy">Payer</button>

        </form>

</main>
@endsection





    <script src= "{{asset('resources/js/bootstrap.bundle.min.js')}}"  integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      
  </body>
</html>