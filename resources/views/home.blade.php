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
    
<header>
<hr></hr>
  @section('content')
 
  
    <div class="container">
    <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center">
				
						<path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"
						/>
						<circle cx="12" cy="13" r="4" /></svg>
          
      </a>
     

    </div>
  
</header>

<main>

<!--<div class="container">  -->
  
<div class="core">

    <div id="core_category">
    <nav class="nav d-flex justify-content-between"> 
      
      @foreach ($categories as $category)
          <div class="col-1">

              <article >
                     <a href="{{route('showProductsOfCategory',['id'=>$category->id])}}"> <img class="card-img-top" src="{{asset('images/'.$category->image)}}"><a> 
              </article>
              
          </div>   
        @endforeach

      </nav>
    </div>

    <div classe="search"> 
      <form  action="{{route('searchProduct')}}">
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
        <button type="submit" class="btn btn-primary">Valider</button>
      </form>
    </div>

    <div id="core_products">
    <div class="album py-5 bg-light">
    <div class="container">
    
      <div class="row row-cols ">
      
      @foreach($details as $detail)
      
        <div class="col-md-3">

          <div class="card mb-4 shadow-sm">

          
          <img class="card-img-top " src="{{asset('storage/images/'.$detail->image)}}" >

            <div class="card-body">
            <h4><a href="{{route('showProductOfSeller',['id'=>$detail->sellerId])}}">{{ $detail->store}}</a></h4>

              <h5><a href="{{route('product',['id'=>$detail->id])}}">{{ $detail->name}}<a> </h5>
              <p> {{ $detail->description}}</p>

              <p>{{ number_format($detail->price,2) }}€</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <button>voir</button>
                </div>
               
              </div>
            </div>
          </div>
        </div>


        @endforeach
       
      </div>
      
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


