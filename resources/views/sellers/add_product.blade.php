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

</head>

@section('content')
<div class="core">
        <div id="core_registerSeller">


        <hr>

        <div class="form_core">
          <form class="form" method="POST" action="{{route('add_product.post')}}">
	      @csrf 
  @if ($errors->any())
	<div class="alert alert-warning">
		Vous n'avez pas pu ajouté votre produit &#9785;
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
              <label for="price">Prix</label>
              <input type="float" id="price" name="price" value="{{old('price')}}" required>
              @error('price')
      <div id="price_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="catId">Catégorie</label>
              <input type="text" id="catId" name="catId" value="{{old('catId')}}" required>
              @error('catId')
      <div id="catId_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="numstreet">Numéro de rue</label>
              <input type="int" id="numstreet" name="numstreet" value="{{old('numstreet')}}" required>
              @error('numstreet')
      <div id="numstreet_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="namestreet">Nom de la rue</label>
              <input type="text" id="namestreet" name="namestreet" value="{{old('namestreet')}}" required>
              @error('namestreet')
      <div id="namestreet_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="postcode">Code Postal</label>
              <input type="text" id="postcode" name="postcode" value="{{old('postcode')}}" required>
              @error('postcode')
      <div id="postcode_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="city">Ville</label>
              <input type="text" id="city" name="city" value="{{old('city')}}" required>
              @error('city')
      <div id="city_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            
            <div class="formGroupe">
              <label for="storename">Nom du commerce</label>
              <input type="text" id="storename" name="storename" value="{{old('storename')}}" required>
              @error('storename')
      <div id="storename_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="siret">Numéro de SIRET</label>
              <input type="text" id="siret" name="siret" value="{{old('siret')}}" minLength="14" 
              maxLength="14" required>
              @error('siret')
      <div id="siret_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="password">Mot de passe</label>
              <input type="password" id="password" name="password" value="{{old('password')}}" minLength="8" required>
              @error('password')
      <div id="password_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="passwordConfirm">Confirmation du mot de passe</label>
              <input type="password" id="passwordConfirm" name="passwordConfirm" value="{{old('passwordConfirm')}}" minLength="8" required>
              @error('passwordConfirm')
      <div id="passwordConfirm_feedback" class="invalid-feedback">
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