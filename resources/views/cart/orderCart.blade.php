<!doctype html>
<html>

<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
	 crossorigin="anonymous">

     <style>

body{
  font-family: Arial, Helvetica, sans-serif;
  font-style: normal;
  background-image: url("/img_header/test2.jpg");
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
</head>

<body>

<main>

    <div class="container">
   
   
    
        <table class="table table-borderd table-responsive-sm">
            <thead>
                <tr>
                    <td>Produit</td>
                    <td>Quantité</td>
                    <td>Prix unitaire</td>
                    <td>Prix total</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($content as $product)
    
                    <tr>
                        <td>
                            <img class="card-img-top" src="{{asset('storage/images/'.$product->attributes['image'])}}" >
                            {{ $product->name }}  

                        </td>
                        <td>
                        <input name="quantity" type="int" style="height: 2rem"  value="{{ $product->quantity }}" disabled="disabled">          
                  </td>
                        <td> 
                            {{number_format($product->price,2)}}€
                        </td>
                        <td>
                           <strong> {{number_format($product->price * $product->quantity,2)}}€ </strong>
                        </td>             
                        <td>
                               
                       
                        </td>      
                    </tr>
                
            </tbody>
            @endforeach
            <tfooter>
                <tr>
                    @if($count==1)
                    <td> {{$count}} produit</td>
                    @else
                    <td> {{$count}} produits</td>
                    @endif
                    <td></td>
                    <td> Sous total</td>
                    <td> {{number_format($total, 2)}}€</td>
                </tr>
            </tfooter>

        </table>
       


       

</main>





    <script src= "{{asset('resources/js/bootstrap.bundle.min.js')}}"  integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      
  </body>
</html>