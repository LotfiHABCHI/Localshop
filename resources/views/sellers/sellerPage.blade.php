<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>sellerpage</title>
    
    <link href="{{ asset('css/base.css') }}" rel="stylesheet" type="text/css"/>
   
    
  </head>
  
  <body class="body_img">
    
    <div class="header">

      <div id="co">
      <a href="{{ route('login') }}">
        <img class="img_header" src="{{ asset('storage/image/header/connexion_header.png') }}" alt="connect" height="47" width=""/>
      </a>
      </div>

      <div id="logo">
      <a href="{{ route('home') }}">
        <img class="img_header" src="{{ asset('storage/image/header/local_header3.png') }}" alt="logo" height="97" width="450"/>
      </a>
      </div>

      <div id="panier">
      <a href="{{ route('cart.index') }}" target="">
        <img class="img_header" src="{{ asset('storage/image/header/panier_header.png') }}" alt="panier" height="38" width="39"/>
      </a>
      </div>


    </div>

    <hr></hr>



<style>
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
  
  
  /*header*/
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
  

  /*core*/
  .core hr{
    width:50%;
    color: rgb(57, 58, 58);
    margin: 0 auto 0 auto;
  }
  
  
  
  /*footer*/
  .footer_hr{
    width:100%;
    color: rgb(57, 58, 58);
    margin-top: 3%;
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
/*core link*/
.core a:link {
    color: rgb(255, 123, 0);
  }
  
  .core a:visited {
    color: rgb(255, 123, 0);
  }
  
  .core a:focus {
    border-bottom: 1px solid;
    background:  rgb(255, 123, 0);
  }
  
  .core a:hover, .btnIdent:hover {
    border-bottom: 1px solid;
    background: rgb(255, 224, 193);
  }
  
  .core a:active {
    background: rgb(255, 123, 0);
    color:rgb(255, 224, 193);
  }


  /*footer link*/
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



*, ::before, ::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  
  /*core*/
  .category{
    display: inline-block;
    margin: auto;
  } 
  .category li{
    display: inline-block;
    height: 12%;
    width: 12%;
  }

  .core{
    height: 70%;
    width: 95%;
    margin-top: 10px;
    margin-left: auto;
    margin-right: auto;
  }

  .search{
    margin: 50px auto 50px auto;
    width: 70%;
    vertical-align: middle;
    
  }

  #inputSearch{
    padding: 10px;
    border: 2px solid grey;
    border-radius: 10px;
    width: 80%;
    font-size: 24px;
    display: inline-block;
    margin: 0 20px 0 0;
    vertical-align: middle;
  }

  #btnSearch{
    background-color: rgb(230, 154, 79);
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    font-size: 24px;
    border-radius: 10px;
    display: inline-block;
    vertical-align: middle;
  }



  .store{
    display:flex;
    margin: 50px auto 50px auto;
    width: 100%;
  }




  /*vendeur*/
.seller{
    display: inline-block;
    padding: 15px;
    width: 40%;
    border: 3px solid #70AD47;
    border-radius: 10px;
    box-shadow: 10px 5px 5px grey;
}
/*info vendeur*/
.seller h2{
  text-align: center;
  font-size: 30px;
}

#img_seller{
  width: 80%;
  height: 200px;
  margin: 20px auto 20px auto;
  text-align: center;
}

#img_seller img{
  max-width: 100%;
  max-height: 100%
}

/*description*/
#divDescription a:link, #divDescription a:visited, #divDescription a:focus, #divDescription a:hover, #divDescription a:active{
  color:rgb(255, 248, 248);
  background-color: rgb(255, 248, 248);;
}

#divDescription{
  width: 70%;
  height: 150px;
  padding: 5px;
  margin: 20px auto 20px auto;
}

#divDescription button{
  height: 100%;
  width: 100%;
}

#btnDescription{
  display: inline-block;
  background-color: #70AD47;
  border: none;
  color: white;
  padding: 30px 50px;
  text-align: center;
  text-decoration: none;
  font-size: 50px;
  border-radius: 10px;
}


#divAddDescription p{
  padding: 5px;
}

#formDescription{
  padding: 5px;
  height: 300px;
}

#txtDescription{
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

.nb_item{
  margin: 30px 0 30px 0;
}



/*produit*/
.products{
    padding: 10px;
    width: 60%;
}


/*fiche produit*/
.product_card{
    display: inline-block;
    width: 30%;
    border: 2px solid #e9aa4b;
    border-radius: 10px;
    box-shadow: 10px 5px 5px grey;
    background-color: white;
    text-align: center;
    position:relative;
    margin:9px;
    height: 370px;
    vertical-align: middle;
}


/*btn supp produit*/
#delete, #inputDelete{
  background-color: white;
  float: right;
  border-radius: 5px;
}

/*img fiche produit sellerB*/
.img{
  height: 200px;
  width: 100%;
  margin: 0 0 10px 0;
  overflow:hidden;
}

.img img{
  max-width: 150%;
  max-height: 150%
}

/*img fiche produit addDes*/
.imgC{
  margin-top: 21px;
  height: 200px;
  width: 100%;
  margin-bottom: 10px;
  overflow:hidden;
}

.imgC img{
  max-width: 150%;
  max-height: 150%
}

/*fiche produit txt*/
.txtproduct{
  word-break: break-all;
  margin: 0 0 10px 0;
  padding: 10px;
}

.productN a:link, .productN a:visited, .productN a:focus, .productN a:hover, .productN a:active {
  color: rgb(57, 58, 58);
}


.productN, .storeN{
  margin: 10px 0 10px 0;
  font-size: 24px;
  font-weight: bold;
  max-width: 100%;
  color: rgb(57, 58, 58);
}

.categoryN{
  background-color: white;
  color: #e9aa4b;
  font-weight: bold;
  border: 2px solid #e9aa4b;
  position: absolute;
  left:0;
  top: 30px;
  text-transform: uppercase;
  padding: 5px 10px 5px 5px;
  border-radius: 10px 40px 40px 10px;
}


.info_product{
  color: rgb(141, 128, 128);
}

.price_product{
  font-size: 24px;
  font-weight: bold;
  margin-top: 10px;
}


/*card add product*/
.product_cardAdd{
  width: 30%;
  border: 2px solid #e9aa4b;
  border-radius: 10px;
  box-shadow: 10px 5px 5px grey;
  background-color: white;
  text-align: center;
  margin: 9px;
  height: 250px;
  padding: 10px;
  display: inline-block;
  position:relative;
  vertical-align: middle;
}

#addP{
  font-size: 150px;
  height: 100%;
  width: 100%;
  position:absolute;
  left:0;
  top:0;
  padding: 10px;
}
    

</style>


<div class="category">
          <ul>
            for
            <li>
              <a href="">
                <img src="">
              </a>
            </li>
            fin
          </ul>
  </div>

<div id="core_seller" >

  <div class="search"> 
    <form action="">
      @csrf

      <div class="form-group">
        <input type="search" id="inputSearch" name="search" placeholder="Que recherchez-vous ?"> 
        <input id="btnSearch" name="search" type="submit" value="Valider">
        
          <div id="search_feedback" class="invalid-feedback">
            
          </div>
        
      </div>

    </form>
  </div>


  <div class="store">

    <div class="seller">
        <h2>storename</h2>
        <div id="img_seller">
        <img  src="{{ asset('storage/image/asperge.jpg') }}">
        </div>
        <div id="divAddDescription">
            <p>DESCRIPTIONIOJREGJREGIJ<br>DESCRIPTIONIOJREGJREGIJ<br>
            DESCRIPTIONIOJREGJREGIJ<br>
            DESCRIPTIONIOJREGJREGIJ<br>
            DESCRIPTIONIOJREGJREGIJ<br>
            DESCRIPTIONIOJREGJREGIJ<br>
            DESCRIPTIONIOJREGJREGIJ<br>
            DESCRIPTIONIOJREGJREGIJ<br>
            DESCRIPTIONIOJREGJREGIJ<br>
            DESCRIPTIONIOJREGJREGIJ<br>
            DESCRIPTIONIOJREGJREGIJ<br>
        </p>
            <a id="btnEdit" href="#">
                EDITER
            </a>
        </div>
      
        <div class="nb_item">
            <p>Nombre de produits en vente : 0956054</p>
            for
            <p>categoriename : nombre pour categorie name</p>
            endfor
        </div>
    </div>

    @foreach ($details as $detail)
    @if( session()->get('alluser')['roleid'] ==1)
    
    <div class="products">
      
    

    

      

      <div class="product_card">
      
        <form id="delete" methode="POST" >
          <input id="inputDelete" value="&#10060" type="submit">
        </form>

        <div class="img">
          <a href="route('product',['id'=>$detail->productid])}}">
            <img src="{{asset('storage/images/'.$detail->productimage)}}">
          </a>
        </div>

        <hr>
        <div class="txtproduct">
          <p class="categoryN">
              Fruits
          </p>

          <p class="productN">
          <a href="{{route('product',['id'=>$detail->productid])}}">{{ $detail->productname }} <a>
              
            </a>
          </p>
          
          
            <div class="info_product">{{ $detail->productinfo }}</div>
            <div class="price_product">{{ number_format($detail->productprice,2) }} pièce</div>
        </div>
      </div>

      <div class="product_cardAdd">
        <a id="addP" href=<a  href="{{ route('add_product') }}"> &#10010</a>
    </div>
    
      @else
      


      <div class="product_card">
      
        

        <div class="img">
          <a href="">
            <img src="{{asset('storage/images/'.$detail->productimage)}}">
          </a>
        </div>

        <hr>
        <div class="txtproduct">
          <p class="categoryN">
              Fruits
          </p>

          <p class="productN">
          <a href="{{route('product',['id'=>$detail->productid])}}">{{ $detail->productname }} <a>
              
            </a>
          </p>
          
          
            <div class="info_product">{{ $detail->productinfo }}</div>
            <div class="price_product">{{ number_format($detail->productprice,2) }} pièce</div>
        </div>
      </div>
      @endif
      @endforeach

    

      
      
  


    </div>
      


</div>

</div>
</div>


    <hr></hr>

    
    
   

  </body>
</html>