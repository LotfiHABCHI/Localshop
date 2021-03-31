@extends('layouts.base')

@section('title', 'Contact')

@section('css')
  @parent
  <link href="{{ asset('css/footer/footer.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div id="core_contact">
    <h1>Contact</h1>

    <hr></hr>

    <div class="form_core">
        <form class="form" method="POST" action="{{route('contact.post')}}">
            <p class="subTitle">
            <h3>Nous contacter</h3>
            </p>

            @csrf 
            @if ($errors->any())
            <div class="alert alert-warning">
                Impossible d'envoyer votre message &#9785;
            </div>
            @endif

            @if(session('success'))
            <div>
                {{session('success')}}
            </div>
            @endif


            <div class="formGroupe">
                <label for="lastname">Nom</label>
                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" required>
                @error('lastname')
                <div id="lastname_feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="formGroupe">
                <label for="firstname">Prénom</label>
                @if(session()->has('alluser'))
                    <input type="text" id="firstname" name="firstname" value="{{ session()->get('alluser')['alluserfirstname'] }}" required>
                @else
                    <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" required>
                @endif
                @error('firstname')
                <div id="firstname_feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="formGroupe">
                <label for="email">Adresse Email</label>
                @if(session()->has('alluser'))
                    <input type="email" id="email" name="email" value="{{ session()->get('alluser')['alluseremail'] }}" required> 
                @else
                    <input  type="email" id="email" name="email" value="{{old('email')}}" required> 
                @endif
                @error('email')
                <div id="email_feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="formGroupe">
                <label for="message">Message</label>
                <textarea name="message" id="message"  rows="7" cols="30" maxLenght="1000" required></textarea>
                @error('message')
                <div id="message_feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="formGroupe">
                <input type="submit" value="ENVOYER" class="buttonSub">
            </div>

        </form>
    </div>

            <div id="redirectFaq">
                <p>
                Vous avez une question ?<br>
                Consultez la <a href="{{ route('faq') }}">FAQ</a>
                </p>
            </div>
   
        </div>
@endsection

@section('script')
<script src="{{ asset('js/log/connexion.js') }}"></script>
@endsection