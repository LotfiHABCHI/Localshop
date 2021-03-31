@extends('layouts.base')

@section('title', 'M\'identifier')

@section('css')
  @parent
  <link href="{{ asset('css/log/login.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
      <div id="core_connexion">
        <h1>Connexion</h1>

        <hr>

        <div class="form_core">
          <form class="form"  method="POST" action="{{ route('login.post') }}">
          <p class="subTitle">
              <h3>S'identifier</h3>
          </p>

          @csrf
          @if ($errors->any())
          <div class="alert alert-warning">
            Vous n'avez pas pu vous connecté &#9785;
          </div>
          @endif
            
            <div class="formGroupe">
              <label for="email">Adresse Email</label>
              <input type="email" id="email" name="email" value="{{ old('email') }}" required>
              @error('email')
              <div id="email_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="formGroupe">
              <label for="password">Mot de passe</label>
              <input type="password" id="password" name="password" value="{{ old('password') }}" minLength="8" required>
              @error('password')
              <div id="password_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="formGroupe">
              <input type="submit" value="VALIDER" class="buttonSub">
            </div>

            <div class="mdpPerdu">
              <a href="{{route('reset')}}">Mot de passe oublié ?</a>
            </div>
          </form>
        </div>
        
        <div id="redirectRegister">
          <p>
          Vous n'avez pas encore de compte ?<br>
          Inscrivez-vous <a href="{{ route('registerCustomer') }}"><input class="btnIdent" type="submit" value="Client/Cliente"></a>
           <a href="{{ route('registerSeller') }}"><input  class="btnIdent" type="submit" value="Producteur/Productrice" /></a>
          </p>
        </div>
        

      </div>
    
@endsection

@section('script')
<script src="{{ asset('js/log/connexion.js') }}"></script>
@endsection
