@extends('layouts.base')

@section('title', 'Inscription Producteur')

@section('css')
  @parent
  <link href="{{ asset('css/log/registerSeller.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
        <div id="core_registerSeller">

        <h1>Inscription Producteur/Productrice</h1>

        <hr>

        <div class="form_core">
          <form class="form" method="POST" action="{{route('registerSeller.post')}}" enctype="multipart/form-data">
	      @csrf 
  @if ($errors->any())
	<div class="alert alert-warning">
		Vous n'avez pas pu être inscrit &#9785;
	</div>
	@endif

            <p class="subTitle">
              <h3>Créer votre compte</h3>
            </p>

            <div class="formGroupe">
              <label for="firstname">Prénom</label>
              <input type="text" id="firstname" name="firstname" value="{{old('firstname')}}" required>
              @error('firstName')
      <div id="firstName_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            
            <div class="formGroupe">
              <label for="lastname">Nom</label>
              <input type="text" id="lastname"  name="lastname" value="{{old('lastname')}}" required>
               @error('lastname')
      <div id="lastname_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            
            <div class="formGroupe">
              <label for="email">Adresse Email</label>
              <input type="email" id="email" name="email" value="{{old('email')}}" required>
              @error('email')
      <div id="email_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
            <div class="formGroupe">
              <label for="phone">Numéro de téléphone</label>
              <input type="text" id="phone" name="phone" value="{{old('phone')}}" required>
              @error('phone')
      <div id="phone_feedback" class="invalid-feedback">
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
              <label for="image">Image</label>
              <input type="file" id="image" name="image" value="upload" >
              @error('image')
      <div id="image_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>

            <div class="formGroupe">
              <label for="description">Description</label>
              <input type="text" id="description" name="description" value="{{old('description')}}" >
              @error('description')
      <div id="description" class="invalid-feedback">
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
        
        <div id="redirectConnexion">
          <p>
          Vous avez déjà un compte ?<br>
          Identifiez-vous <a href="{{ route('login') }}"><input type="submit" class="btnIdent" value="S'identifier" /></a>
          </p>
        </div>



      </div>
   
      
@endsection

@section('script')
<script src="{{ asset('js/log/connexion.js') }}"></script>
@endsection
