@extends('layouts.base')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>{{ $seller[0]->storename }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="{{asset('resources/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

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

.footer_hr{
  width:100%;
  color: rgb(57, 58, 58);
  margin-top: 3%;
}


.core{
  height: 70%;
}



.category li{
  display: inline-block;
  height: 12%;
  width: 12%;
}




.seller{
  display: flex;
border: solid 2px red;
}

.human{
  display: inline-block;
border: solid 2px blue;
margin:1%;
width: 40%;
height: auto;
}

.seller_title{
  font-size: 25px;
  text-align: center;
  color: rgb(57, 58, 58);
}

.item{
  display: inline-block;
border: solid 2px green;
margin:1%;
width: 100%;
height: auto;
}

.nb_item{
border: solid 2px yellow;
margin:1%;
height: auto;
}

.seller_description{
  text-align: justify;
  color: rgb(57, 58, 58);
}





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

.seller{
    display: inline-block;
    padding: 15px;
    width: 40%;
    border: 3px solid #70AD47;
    border-radius: 10px;
    box-shadow: 10px 5px 5px grey;
}

#btnDescription{
  background-color: #70AD47;
  border: none;
  color: white;
  padding: 30px 50px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 50px;
  margin: 20px auto 20px auto;
  border-radius: 10px;
}

#divDescription{
  border: 2px solid red;
}

#formDescription{
  border: 2px solid yellow;
  padding: 5px;
  height: 300px;
}

#txtDescription{
  border: 2px solid blue;
  width: 100%;
  max-width: 100%;
  min-width: 100%;
  max-height: 80%;
  min-height: 80%;
  font-family: Arial, Helvetica, sans-serif;
  font-style: normal;

}

#btnValider, #btnEdit{
  border: 2px solid green;
  background-color: #70AD47;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  margin: 10px 0px auto 70%;
  border-radius: 10px;
}

    </style>

    <script>



///HTML



//JS
function load_div_edit() {
        //supp div existante
        var removediv = document.getElementById('divDescription');
        removediv.parentNode.removeChild(removediv);

        //creer nouvelle div
        var divDescription = document.createElement('div');

        //position div + info div
        var ancreDescription = document.getElementById('ancre');
        ancreDescription.appendChild(divDescription);
        divDescription.setAttribute("id", "divDescription");
        
        //contenu div
        divDescription.innerHTML='Modifier votre description ci-dessous : ';
        //creer form + input + btnValider
        var formDescription = document.createElement('form');
        var txtDescription = document.createElement('textarea');
        var btnValider = document.createElement('button');

        //form
        divDescription.appendChild(formDescription);
        formDescription.setAttribute("id", "formDescription");
        formDescription.setAttribute("method", "POST");
        formDescription.setAttribute("action", "{{route('desc.edit', ['sellerid'=>$seller[0]->sellerid])}}");

        //input
        formDescription.appendChild(txtDescription);
        txtDescription.setAttribute("id", "txtDescription");
        txtDescription.setAttribute("name", 'txtDescription');

        //btn
        formDescription.appendChild(btnValider);
        btnValider.setAttribute("id", "btnValider");
        btnValider.setAttribute("onclick", "load_description()");
        btnValider.setAttribute("type", "submit")
        btnValider.innerHTML ="Valider";
    };

    function load_description() {
        //supp div
        var removediv = document.getElementById('divDescription');
        removediv.parentNode.removeChild(removediv);

        //creer div
        var divDescription = document.createElement('div');

        //position div
        var ancreDescription = document.getElementById('ancre');
        ancreDescription.appendChild(divDescription);
        divDescription.setAttribute("id", "divDescription");

        //contenu div
        //rempli div de notre txt
        divDescription.innerHTML="{{$seller[0]->sellerdescription}}";

        //creer btn edit pour modifier
        var btnEdit = document.createElement('button');
        divDescription.appendChild(btnEdit);
        btnEdit.setAttribute("id", "btnEdit");
        btnEdit.setAttribute("onclick", "load_div_edit()");
        btnEdit.setAttribute("type", "submit")
        btnEdit.innerHTML ="Edit"

    };






   /* function load_div_edit() {
        //supp div
        var removediv = document.getElementById('divDescription');
        removediv.parentNode.removeChild(removediv);

        //creer div
        var divDescription = document.createElement('div');

        //position div
        var ancreDescription = document.getElementById('ancre');
        ancreDescription.appendChild(divDescription);
        divDescription.setAttribute("id", "divDescription");
        
        //contenu div
        divDescription.innerHTML='Modifier votre description ci-dessous : ';

        //creer form + input + btnValider
        var formDescription = document.createElement('form');
        var txtDescription = document.createElement('input');
        var btnValider = document.createElement('input');

        //form
        divDescription.appendChild(formDescription);
        formDescription.setAttribute("id", "formDescription");
        formDescription.setAttribute("method", "POST");
        formDescription.setAttribute("action", "");

        //input
        formDescription.appendChild(txtDescription);
        txtDescription.setAttribute("id", "txtDescription");
        txtDescription.setAttribute("name", 'txtDescription');


        //btn
        formDescription.appendChild(btnValider);
        btnValider.setAttribute("id", "btnValider");
        btnValider.setAttribute("onclick", "load_description()");
       // btnValider.setAttribute("type", "button")
        btnValider.setAttribute("type", "hidden");
        btnValider.setAttribute("value", "valider");
        btnValider.setAttribute("name", "txtDescription");
        //btnValider.innerHTML ="Valider";

        


      
    };

    function load_description() {
        //supp div
        var removediv = document.getElementById('divDescription');
        removediv.parentNode.removeChild(removediv);

        //creer div
        var divDescription = document.createElement('div');

        //position div
        var ancreDescription = document.getElementById('ancre');
        ancreDescription.appendChild(divDescription);
        divDescription.setAttribute("id", "divDescription");

        //contenu div
        //rempli div de notre txt
        divDescription.innerHTML="{{$seller[0]->sellerdescription}}";

        //creer btn edit pour modifier
        var btnEdit = document.createElement('button');
        divDescription.appendChild(btnEdit);
        btnEdit.setAttribute("id", "btnEdit");
        btnEdit.setAttribute("onclick", "load_div_edit()");
        btnEdit.setAttribute("type", "submit");
        btnEdit.innerHTML ="Edit";

        formDescription.submit();

    };*/

    
    


      </script>

    
  </head>
  <body>
    


<main>
@section('content')
<div class="container">
  


<div class="seller">
 

  <div class="seller">
      <h2>{{ $seller[0]->storename }}</h2>
      <img id="img_seller" src="{{asset('storage/images/'.$seller[0]->sellerimage)}}">
      <div id="divDescription">
      <button id="btnDescription" onclick="load_div_edit()" type="button">EDITER</button>
      </div>
      <p id="ancre"></p>
      <div class="nb_item">
        <p> {{$count}} produit(s)</p>
      </div>
    </div>

    <!-- <div class="human">

    <p class="seller_title">{{ $seller[0]->storename }}</p>
    <img class="card-img-top"  src="{{asset('storage/images/'.$seller[0]->sellerimage)}}">
    <div class="nb_item">
   {{$count}} produit(s)
    </div>
    <p class="seller_description">Bonjour, je vends des supers legumes Bonjour, je vends des supers legumes Bonjour, je vends des supers legumes</p>
  
  </div> -->




    <div class="container-fluid">
      <div class="row row-cols ">
      @foreach ($products as $detail)
      <div class="card shadow-sm">
      <img class="card-img-top"  src="{{asset('storage/images/'.$detail->productimage)}}">

            <div class="card-body">
              <p class="card-text"><a href="{{route('product',['id'=>$detail->productid])}}">{{ $detail->productname }} ({{$detail->productid}})<a> </p>
              {{ number_format($detail->productprice,2) }}€
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">                
                  <form action="{{ route('stock.update', $detail->productid) }}" method="POST" id="stock_update">
                    @csrf
                      <input class="form-control" name="stock" type="number" style="height: 2rem" min="1" max="99" value="{{ $detail->productquantity }}">
                      <button class="btn btn-sm btn-outline-tertiary" id="stock_update"> &#10004 </button>                  
                  </form>   
                </div>
              </div>
            </div>
          </div>

          @endforeach
          
      </div>
    </div>
      <button class="btn btn-sm btn-outline-secondary"><a  href="{{ route('add_product') }}"> Ajouter un produit </a> </button>
  </div>
</div>

</div>
</main>

@endsection


      

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <script src= "{{asset('resources/js/bootstrap.bundle.min.js')}}"  integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      
  </body>
</html>








