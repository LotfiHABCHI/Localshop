@extends('layouts.base') 

@section('title', 'message') 

@section('content')
<form method="POST" action="{{route('contact.post')}}">
	@csrf @if ($errors->any())
	<div class="alert alert-warning">
		Impossible d'envoyer votre message &#9785;
	</div>
	@endif
	<div class="form-group">
		<label for="email">E-mail</label>
    @if(session()->has('people'))
      <input type="email" id="email" name="email" value="{{ session()->get('people')['email'] }}"
             aria-describedby="email_feedback" class="form-control @error('email') is-invalid @enderror"> 
      @else
      <input  type="email" id="email" name="email" value="{{old('email')}}"
             aria-describedby="email_feedback" class="form-control @error('email') is-invalid @enderror"> 
             @endif
      @error('email')
      <div id="email_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="name">Nom</label>
      <input type="text" id="name" name="name" value="{{old('name')}}"
             aria-describedby="name_feedback" class="form-control @error('name') is-invalid @enderror">  
      @error('name')
      <div id="name_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="message"></label>
      <textarea  name="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror"  placeholder="votre message">{{old('message')}}</textarea>
      @error('message')
      <div id="message_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>
@endsection