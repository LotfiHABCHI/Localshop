@extends('layouts.base')

@section('title', 'Modifier mon mot de passe')

@section('css')
  @parent
  <link href="{{ asset('css/log/login.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div id="core_changePassword">
        <h1>Changer mon mot de passe</h1>

        <hr>

        <div class="form_core">
          <form class="form"  method="POST" action="{{ route('changePassword.post') }}">
          @csrf
          @if ($errors->any())
          <div class="alert alert-warning">
            Votre mot de passe n'a pas pu être changé &#9785;
          </div>
          @endif
            
            <div class="formGroupe">
              <label for="email">Adresse Email</label>
              <input type="email" id="email" name="email" value="{{ session()->get('alluser')['alluseremail'] }}" required>
              @error('email')
              <div id="email_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="formGroupe">
              <label for="old_password">Mot de passe actuel</label>
              <input type="password" id="old_password" name="old_password" minLength="8" required>
              @error('old_password')
              <div id="old_password_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="formGroupe">
              <label for="new_password">Nouveau mot de passe</label>
              <input type="password" id="new_password" name="new_password" minLength="8" required>
              @error('new_password')
              <div id="new_password_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="formGroupe">
              <label for="new_passwordConfirm">Confirmation du nouveau mot de passe</label>
              <input type="password" id="new_passwordConfirm" name="new_passwordConfirm" minLength="8" required>
              @error('new_passwordConfirm')
              <div id="new_passwordConfirm_feedback" class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="formGroupe">
              <input type="submit" value="VALIDER" class="buttonSub">
            </div>
          </form>
        </div>
@endsection

@section('script')
<script src="{{ asset('js/log/connexion.js') }}"></script>
@endsection