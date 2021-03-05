<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Accueil</title>


    <link href="{{asset('resources/css/style.css')}}" rel="stylesheet" type="text/css">

  <style>

body{
    font-family: Arial, Helvetica, sans-serif;
    font-style: normal;
    background-image: url("test2.jpg");
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
  
  #logo img{
    text-align: center;
  }
  
  #logo{
    margin-left: 24.2%;
    display: flex;
    text-align: center;
  }
  
  hr{
    width:100%;
    color: rgb(57, 58, 58);
  }
  
  
  .core{
    height: 70%;
    padding: 9%;
  }
  
  #text{
    margin-left: auto;
    margin-right: auto;
  }
  
  #click{
    text-align: center;
    font-size: 40px;
    font-style: bold ;
    color: rgb(57, 58, 58);
  }
  
  #below_click{
    text-align: center;
    font-size: 30px;
    font-style: bold ;
    color: rgb(57, 58, 58);
  }
  
  #input{
    text-align: center; 
    cursor: pointer; 
  }
  
  #valid{
    border-color: #B9863A;
    background-color: #B9863A;
  }
  
  
  .footer{
    display: flex;
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

    
  </head>
  
  <body>

    <div class="header">

      <div id="co">
      <a href="commerce.html" target="">
        <img class="img_header" src="connexion_header.png" alt="47" height="47" width=""/>
      </a>
      </div>

      <div id="logo">
      <a>
        <img class="img_header" src="local_header3.png" alt="" height="97" width="450"/>
      </a>
      </div>


    </div>

    <hr></hr>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Large</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      
    @foreach ($categories as $category)
        <div class="col-2">
            <article class="card">
                  <header class="card-header">
                        <p><a href="{{route('showProductsOfCategory',['id'=>$category->id])}}">{{ $category->name }}<a></p> 
                  </header>
                <div class="card_body">
                    {{$category->descprition}}
                </div>
                <footer class="card-footer">
                   <img class="card-img-top" src="{{asset('images/'.$category->image)}}" >
                </footer>
            </article>
        </div>   
         @endforeach
    </nav>
  </div>
</div>
    <div class="core">
      <div id="text">
        <p id="click">
          Click and Collect, tout est dans le nom !
        </p>
        <p id="below_click">
          Consommez près de chez vous et facilement
        </p>
      </div>

      <div id="input">
        <input type="text" id="adress" name="name" size="50" value="Entrez votre adresse ici" onclick="value = ''">
       <button id="valid">VALIDER</button>
       
      </div>

    </div>

    <hr></hr>

    <div class="footer">
    <div id="propos">
      <a href="propos.html">
        A PROPOS
      </a>
      </div>

      <div id="faq">
      <a href="faq.html">
        FAQ
      </a>
      </div>

      <div id="mention">
      <a href="mention.html">
        MENTIONS LEGALES
      </a>
      </div>

      <div id="contact">
      <a href="contact.html">
        CONTACT
      </a>
      </div>

      <div id="cci">
          © 2021 CCI | All rights reserved.
      </div>
    </div>

  </body>
</html>