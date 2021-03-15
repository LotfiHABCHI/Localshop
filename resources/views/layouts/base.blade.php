<!doctype html>
<html>

<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
	 crossorigin="anonymous">
</head>

<body>
<div class="navbar navbar-dark bg-dark shadow-sm">

    <div class="header">
        <div id="co">
       
        @if (session()->has('people'))
       

        {{ session()->get('people')['firstname'] }}


        @if( session()->get('people')['role'] ==2)
        
        <li class="nav-item">
                            <a href="{{ route('seller.login') }}"><img class="img_header" src="{{asset('images/'.'connexion.png')}}" alt="connect" height="47" width=""/></a>
                        </li>        
        @endif                           

        <ul class="navbar-nav ml-auto">
                        
                 
                            
                   <!-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"></a>
                        </li>
                    @endif -->
                  
                        <li class="nav-item dropdown">
                       
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            </a>
                           
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href=" #">
                                        {{ __('Mon compte') }}
                                </a>

                                <a class="dropdown-item" href="#">
                                        {{ __('Mes commandes') }}
                                </a>

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
            @else 
            <li class="nav-item">
                            <a href="{{ route('seller.login') }}"><img class="img_header" src="{{asset('images/'.'connexion.png')}}" alt="connect" height="47" width=""/></a>
                        </li>
        @endif

        
            
            
        </div>
      


        <div id="logo">
        <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center">
                <img class="img_header" src="{{asset('images/'.'local.png')}}" alt="logo" height="97" width="450"/>
            </a>
        </div>

        <div id="panier">
        @if (session()->has('people'))
           
                <a href="{{route('cart.index')}}"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39" /> </a>
             
        @else 
        <a href="{{route('seller.login')}}"><img class="img_header" src="{{asset('images/'.'panier.png')}}" alt="panier" height="38" width="39" /></a> 
       @endif
            
</div>
    </div>
    </div>
    <div class="container">
            @yield('content')
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    </body>
</html>