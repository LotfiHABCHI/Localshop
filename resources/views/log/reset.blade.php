@extends('layouts.base')

@section('title', 'Mot de passe oublié')

@section('css')
  @parent
  <link href="{{ asset('css/log/login.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div id="core_reset">
        <h1>Mot de passe oublié</h1>

        <hr>

        <div class="form_core">
        <form class="form"  method="POST" action="{{ route('reset.post') }}">
          @csrf
          @if ($errors->any())
          <div class="alert alert-warning">
            Cette adresse email n'existe pas &#9785;
          </div>
          @endif

          @if (session('success'))
          <div>
            {{session('success')}}
          </div>
          @endif

            
            <div class="formGroupe">
              <label for="email">Entrez votre adresse email</label>
              <input type="email" id="email" name="email" value="{{ old('email') }}" required>
              @error('email')
              <div id="email_feedback" class="invalid-feedback">
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
@endsection

@section('script')
<script src="{{ asset('js/log/connexion.js') }}"></script>
@endsection