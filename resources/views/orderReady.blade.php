<style>
#logo img{
  text-align: center;
}

#logo{
  margin-left: 24.2%;
  display: flex;
  text-align: center;
}
</style>
<div id="logo">
        <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center">
                <img class="img_header" src="{{asset('images/'.'local.png')}}" alt="logo" height="97" width="450"/>
            </a>
        </div><!DOCTYPE html>
        
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h2>Du nouveau à propos de votre commande</h2>
    
    
       Bonjour, <br>
       Votre commande est prête! <br> 
       Vous pouvez la récupérer de 9:00 à 18:00 au {{$seller[0]->sellernumstreet}} {{$seller[0]->sellernamestreet}} <br>
       A bientot!
    
  </body>
</html>