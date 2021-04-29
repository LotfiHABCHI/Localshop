<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
	 crossorigin="anonymous">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet" type="text/css"/>
    @yield('css')
    
  </head>

  <body class="body_img">
<!-- truc de bootstrap commence ici -->

  
       

      
          
<!-- truc de bootstrap se termine ici -->


       
  
    @if (session()->has('alluser'))
    <div class="header">

    


<ul id="co" class="navbar-nav  ">
                

                    
           <!-- @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"></a>
                </li>
            @endif -->
            <img class="img_header" src="{{asset('images/'.'connexion.png')}}" alt="connect" height="47" width=""/>
            {{ session()->get('alluser')['alluserfirstname'] }}
                <li class="nav-item dropdown">
               
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    </a>
                   
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @if( session()->get('alluser')['roleid'] ==1)
                    <a class="dropdown-item" 
                    href="{{route('showProductOfSeller', ['id'=>session()->get('alluser')['allusersellerid']])}}">
                                {{ __('Mon magasin') }}
                        </a>
                    
                          @endif
                        @if( session()->get('alluser')['roleid'] ==1)
                        <a class="dropdown-item" href="{{ route('addProduct') }}">
                                {{ __('Ajouter un produit') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('orderValidate') }}">
                                {{ __('Mes commandes') }}
                        </a>
                            @else
                            <a class="dropdown-item"  href="{{route('order',  ['customerId'=>session()->get('alluser')['allusercustomerid']] )}}">
                                {{ __('Mes commandes') }}
                        </a>
                        @endif
                        <a class="dropdown-item"   href="{{route('changePassword')}}">{{__('Modifier le mot de passe')}}</a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Deconnexion') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
         
    </ul>

      <div class="logo">
        <a href="{{ route('home') }}">
          <img class="img_header" src="{{asset('images/'.'local.png')}}" alt="logo" height="97" width="450"/>
        </a>
      </div>
      @if( session()->get('alluser')['roleid'] ==1)
      <div class="panier">
<a href="{{route('orderValidate')}}">
    <img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39"/>
  </a>
</div>
@elseif( session()->get('alluser')['roleid'] ==2)
      <div class="panier">
<a href="{{route('cart.index')}}">
    <img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39"/>
  </a>
</div>
@endif

      

    </div>
@else
<div class="header">

    
           <li id="co1" class="nav-item">
              <a href="{{ route('login') }}"><img class="img_header" src="{{asset('images/'.'connexion.png')}}" alt="connect" height="47" width=""/></a>
              <p>Connexion </p> </li>
                           
     
  

<div class="logo">
  <a href="{{ route('home') }}">
    <img class="img_header" src="{{asset('images/'.'local.png')}}" alt="logo" height="97" width="450"/>
  </a>
</div>

<div class="panier">
<a href="{{route('login')}}">
    <img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39"/>
  </a>
</div>

</div>
@endif

    <hr></hr>

    <div class="core">
    @yield('content')
    </div>


    <hr></hr>

    <div class="footer">
    <div id="propos">
      <a href="{{route('about')}}">
        A PROPOS
      </a>
      </div>

      <div id="faq">
      <a href="{{route('faq')}}">
        FAQ
      </a>
      </div>

      <div id="mention">
      <a href="{{route('mentions')}}">
        MENTIONS LEGALES
      </a>
      </div>

      <div id="contact">
      <a href="{{route('contact')}}">
        CONTACT
      </a>
      </div>

      <div id="cci">
          © 2021 CCI | All rights reserved.
      </div>
    </div>
    
    @yield('script')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  </body>
</html>