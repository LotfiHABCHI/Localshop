@extends('layouts.base')
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.80.0">
	<title>Album example · Bootstrap v5.0</title>

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


/*core*/
.core{
  height: 70%;
  width: 80%;
  margin-left: auto;
  margin-right: auto;
}

.form_core{
  display: flex;
  margin: 1% auto 1% auto;
  width: 500px;
  height: auto;
  padding: 25px 25px 0px 25px;
  border-radius: 3px;
}

.form h3 {
    color: rgb(57, 58, 58);
    font-size: 25px;
    font-weight: 500;
    margin-bottom: 45px;
    
}

.form{
  width: 400px;
  margin: 1% auto 1% auto;
}

#redirectConnexion{
  margin: 1% auto 1% auto;
  width: 500px;
 
}

.form .formGroupe {
    position: relative;
    display: flex;
    margin-bottom: 50px;
}
.form .formGroupe label {
    position: absolute;
    top: 50%;
    left: 0px;
    transform: translateY(-50%);
    color: rgb(57, 58, 58);
    font-size: 20px;
    transition: 0.4s ease-out;
}
.form .formGroupe input {
    display: block;
    width: 100%;
    padding: 10px 0px;
    border: none;
    outline: none;
    background: none;
    border-bottom: 3px solid rgb(57, 58, 58);
    color: rgb(57, 58, 58);
    font-size: 20px;
    transition: 0.4s ease-out;
}
.formGroupe:nth-child(4) {
    margin-bottom: 40px;
    justify-content: center;
}
.form .formGroupe .buttonSub {
    display: block;
    width: auto;
    padding: 15px 60px;
    border: 3px solid #77B84B;
    border-radius: 999px;
    background-image: linear-gradient(to right, transparent 50%, rgb(171, 218, 139) 50%, #77B84B);
    background-size: 200%;
    color: #77B84B;
    cursor: pointer;
}

.form .formGroupe .buttonSub:hover {
    color: #fff;
    background-position: 100%;
    border: 3px solid #fff;
}


/* Animation */

.form .formGroupe:focus-within label,
.form .formGroupe.animation label {
    top: 0px;
    transform: translateY(-100%);
    color: rgb(57, 58, 58);
}

.form .formGroupe:focus-within input,
.form .formGroupe.animation input {
    border-bottom-color: #77B84B;
}   





/*footer*/
.footer{
  display: flex;
  padding: 2%;
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


@section('content')










<div class="core">
        <div id="core_registerCustomer">

        <h1>Inscription Client/Cliente</h1>

        <hr>

        <div class="form_core">
          <form class="form" method="POST" action="{{route('customer_register.post')}}">
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
              <label for="lastname">Nom</label>
              <input type="text" id="lastname"  name="lastname" value="{{old('lastname')}}" required>
               @error('lastname')
      <div id="lastname_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>
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
              <label for="email">Adresse Email</label>
              <input type="email" id="email" name="email" value="{{old('email')}}" required>
              @error('email')
      <div id="email_feedback" class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
            </div>

            <div class="formGroupe">
              <label for="phone">phone</label>
              <input type="text" id="phone" name="phone" value="{{old('phone')}}" required>
              @error('phone')
      <div id="phone_feedback" class="invalid-feedback">
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
          Identifiez-vous <a href="/connexion/connexion.html"><input type="submit" class="btnIdent" value="S'identifier" /></a>
          </p>
        </div>



      </div>
    </div>
    @endsection

    <script>
        const inputs = document.querySelectorAll('input');

for (let i = 0; i < inputs.length; i++) {

    let field = inputs[i];

    field.addEventListener('input', (e) => {

        if(e.target.value != ""){
            e.target.parentNode.classList.add('animation');
        } else if (e.target.value == "") {
            e.target.parentNode.classList.remove('animation');
        }

    })

}


        const inputs = document.querySelectorAll('textarea');

for (let i = 0; i < inputs.length; i++) {

    let field = inputs[i];

    field.addEventListener('textarea', (e) => {

        if(e.target.value != ""){
            e.target.parentNode.classList.add('animation');
        } else if (e.target.value == "") {
            e.target.parentNode.classList.remove('animation');
        }

    })

}
</script>