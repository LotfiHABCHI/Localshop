@extends('layouts.base') 

@section('title', 'Modifiez votre mot de passe') 

@section('content')
<form method="POST" action="{{route('changepass.post')}}">
	@csrf @if ($errors->any())
	<div class="alert alert-warning">
		Votre mot de passe n'a pas été modifié &#9785;
	</div>
	@endif
	<div class="form-group">
		<label for="email">E-mail</label>
      <input type="email" id="email" name="email" value="{{old('email')}}"
             aria-describedby="email_feedback" class="form-control @error('email') is-invalid @enderror"> 
      @error('email')
      <div id="email_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="old_password">Ancien mot de passe</label>
      <input type="password" id="old_password" name="old_password" value="{{old('old_password')}}"
             aria-describedby="old_password_feedback" class="form-control @error('old_password') is-invalid @enderror">  
      @error('old_password')
      <div id="old_password_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="new_password">Nouveau mot de passe</label>
      <input type="password" id="new_password" name="new_password" value="{{old('new_password')}}"
             aria-describedby="new_password_feedback" class="form-control @error('new_password') is-invalid @enderror">  
      @error('new_password')
      <div id="new_password_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="new_passwordConfirm">Confirmation du mot de passe</label>
      <input type="password" id="new_passwordConfirm" name="new_passwordConfirm" value="{{old('new_passwordConfirm')}}"
             aria-describedby="new_passwordConfirm_feedback" class="form-control @error('new_passwordConfirm') is-invalid @enderror">  
      @error('new_passwordConfirm')
      <div id="new_passwordConfirm_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
@endsection