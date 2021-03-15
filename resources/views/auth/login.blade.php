<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>local_shop</title>
    <link href="connexion.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>

    <div class="header">

      <div id="co">
      <a href="/connexion/connexion.html" target="">
        <img class="img_header" src="/img_header/connexion_header.png" alt="connect" height="47" width=""/>
      </a>
      </div>

      <div id="logo">
      <a href="/home/home.html" target="">
        <img class="img_header" src="/img_header/local_header3.png" alt="logo" height="97" width="450"/>
      </a>
      </div>

      <div id="panier">
      <a href="/cart/cart.html" target="">
        <img class="img_header" src="/img_header/panier_header.png" alt="panier" height="38" width="39"/>
      </a>
      </div>

    </div>

    <hr></hr>
 
    <div class="core">
      <div id="core_connexion">
        <h1>Connexion</h1>

        <hr>

        <div class="form_core">
          <form class="form" method="POST" action="{{ route('login') }}">
          @csrf

            <p class="subTitle">
              <h3>S'identifier</h3>
            </p>
            
            <div class="formGroupe">
              <label for="mail">{{ __('Adresse E-mail') }}</label>
              <input type="email" id="mail" name="email" required>
            </div>
            <div class="formGroupe">
              <label for="password">{{ __('Mot de passe') }}</label>
              <input type="password" id="password" name="password" required>
            </div>
            <div class="formGroupe">
              <input type="submit" value="VALIDER" class="buttonSub">
            </div>
            <div class="formGroupe">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">{{ __('Se souvenir de moi') }}</label>
            </div>



            <div class="mdpPerdu">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Mot de passe oublié ?') }}</a>
                @endif
            </div>
          </form>
        </div>
        
        <div id="redirectRegister">
          <p>
          Vous n'avez pas encore de compte ?<br>
          Inscrivez-vous <a href="/connexion/registerCustomer.html"><input type="submit" class="btnIdent" value="Client/Cliente" /></a>
           <a href="seller_register"><input type="submit" class="btnIdent" value="Producteur/Productrice" /></a>
          </p>
        </div>
        

      </div>
    </div>

    <hr></hr>

    <div class="footer">
    <div id="propos">
      <a href="/propos/propos.html">
        A PROPOS
      </a>
      </div>

      <div id="faq">
      <a href="/faq/faq.html">
        FAQ
      </a>
      </div>

      <div id="mention">
      <a href="/mention/mention.html">
        MENTIONS LEGALES
      </a>
      </div>

      <div id="contact">
      <a href="/contact/contact.html">
        CONTACT
      </a>
      </div>

      <div id="cci">
          © 2021 CCI | All rights reserved.
      </div>
    </div>

    <script src="connexion.js"></script>
  </body>
</html>






