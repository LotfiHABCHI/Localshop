@extends('layouts.base') 

@section('title', 'Modifiez votre mot de passe') 

@section('content')
<form method="POST" action="{{route('reset.post')}}">
	@csrf @if ($errors->any())
	<div class="alert alert-warning">
		Votre mot de passe n'a pas été modifié &#9785;
	</div>
	@endif

  @if(session('success'))
    <div>{{session('success')}}
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
    
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
@endsection