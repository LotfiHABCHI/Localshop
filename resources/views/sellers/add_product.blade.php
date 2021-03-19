@extends('layouts.base')
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.80.0">
	<title>Ajouter un produit</title>

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

@section('content')
<div class="core">
        <div id="">


        <hr>

        <div class="form_core">
          <form class="form" method="POST" action="{{route('add_product.post')}}" enctype="multipart/form-data">
	      @csrf 
  @if ($errors->any())
	<div class="alert alert-warning">
		Vous n'avez pas pu ajouter votre produit &#9785;
	</div>
	@endif

           
            
            <div class="formGroupe">
              <label for="name">Nom</label>
              <input type="text" id="name"  name="name" value="{{old('name')}}" required>
               @error('name')
      <div id="name_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="description">Description</label>
              <input type="text" id="description" name="description" value="{{old('description')}}" required>
              @error('description')
      <div id="description_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="image">Image</label>
              <input type="file" id="image" name="image" value="upload" >
              @error('image')
      <div id="image_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="price">Prix</label>
              <input type="float" id="price" name="price" value="{{old('price')}}" required>
              @error('price')
      <div id="price_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="form-group">
		<label for="category">Catégorie</label>

      <select class="form-control" id="category" name="category">
      @foreach($categories as $category)
          <option value="{{$category['id']}}" > {{ $category['name'] }} </option>
      @endforeach
      </select>
    </div>  
    <div class="formGroupe">
              <label for="stock">Stock</label>
              <input type="integer" id="stock"  name="stock" value="{{old('stock')}}" required>
               @error('stock')
      <div id="stock_feedback" class="invalid-feedback">
        {{ $message }}
        </div>
      @enderror
            </div>
            <div class="formGroupe">
              <input type="submit" value="VALIDER" class="buttonSub">
            </div>
          </form>
        </div>


      </div>
    </div>
    @endsection


</html>