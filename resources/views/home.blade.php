@extends('layouts.base')

@section('title', 'Accueil')

@section('css')
  @parent
  <link href="{{ asset('css/home/home.css') }}" rel="stylesheet" type="text/css" />
@endsection



<style>
  .category{
    display : inline-block;
  }
  .products{
    text-align: center;
    
  }
  .product-card {
   
    display: inline-block;
      width: 250px;
      position: relative;
      box-shadow: 0 2px 7px #dfdfdf;
      margin: 50px auto;
      background: #fafafa;
      text-align: center;
  }
  
  .badge {
      position: absolute;
      left: 0;
      top: 30px;
      text-transform: uppercase;
      font-size: 13px;
      font-weight: 700;
      background: green;
      color: #fff;
      padding: 3px 10px;
  }
  .product-card{
    border-radius: 25px;
    margin : 5px;
  }
  
  .product-tumb {
      border-radius : 25px 25px 0px 0px;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 250px;
     /* padding: 1px;*/
      background: #f0f0f0;
  }
  
  .product-tumb img {
    
      max-width: 100%;
      max-height: 100%;
  }
  
  .product-details {
      padding: 30px;
  }
  
  .product-catagory {
      display: block;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      color: #ccc;
      margin-bottom: 18px;
  }
  
  .product-details h4 a {
      font-weight: 500;
      display: block;
      margin-bottom: 18px;
      text-transform: uppercase;
      color: #363636;
      text-decoration: none;
      transition: 0.3s;
  }
  
  .product-details h4 a:hover {
      color: #fbb72c;
  }
  
  .product-details p {
      font-size: 15px;
      line-height: 22px;
      margin-bottom: 18px;
      color: #999;
  }
  
  .product-bottom-details {
      overflow: hidden;
      border-top: 1px solid #eee;
      padding-top: 20px;
      text-align: center  ;
  }
  
  .product-bottom-details div {
      float: left;
      width: 50%;
      text-al;
      
  }
  
  .product-price {
      font-size: 30px;
      color: #fbb72c;
      font-weight: 400;
      text-align: center;
     
  }
  
  .product-price small {
      font-size: 80%;
      font-weight: 400;
      text-decoration: line-through;
      display: inline-block;
      margin-right: 5px;
  }
  
  .product-links {
      text-align: right;
  }
  
  .product-links a {
      display: inline-block;
      margin-left: 5px;
      color: #e1e1e1;
      transition: 0.3s;
      font-size: 17px;
  }
  
  .product-links a:hover {
      color: #fbb72c;
  }

  /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

      #toutemap{
        
      
        margin : 20px auto 20px auto;
      }
     #map {
      
     
      
       height: 500px;
       width :100%;
     }

     /* Optional: Makes the sample page fill the window. */
     html,
     body {
       height: 100%;
       margin: 0;
       padding: 0;
     }

     #description {
       font-family: Roboto;
       font-size: 15px;
       font-weight: 300;
     }

     #infowindow-content .title {
       font-weight: bold;
     }

     #infowindow-content {
       display: none;
     }

     #map #infowindow-content {
       display: inline;
     }

     .pac-card {
       margin: 10px 10px 0 0;
       border-radius: 2px 0 0 2px;
       box-sizing: border-box;
       -moz-box-sizing: border-box;
       outline: none;
       box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
       background-color: #fff;
       font-family: Roboto;
       z-index : 1000;
     }

     #pac-container {
       padding-bottom: 12px;
       margin-right: 12px;
     }

     .pac-controls {
       
       display: inline-block;
       padding: 5px 11px;
     
     }

     .pac-controls label {
       font-family: Roboto;
       font-size: 13px;
       font-weight: 300;
     }

     #pac-input {
       background-color: #fff;
       font-family: Roboto;
       font-size: 15px;
       font-weight: 300;
       margin-left: 12px;
       padding: 0 11px 0 13px;
       text-overflow: ellipsis;
       width: 400px;
     }

     #pac-input:focus {
       border-color: #4d90fe;
     }

     #title { 
       color: #fff;
       background-color: #4d90fe;
       font-size: 25px;
       font-weight: 500;
       padding: 6px 12px;
     }

     

</style>

<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat:  43.3, lng: 5.4 },
          zoom: 13,
        });
        const card = document.getElementById("pac-card");
        const input = document.getElementById("pac-input");
        const biasInputElement = document.getElementById("use-location-bias");
        const strictBoundsInputElement = document.getElementById(
          "use-strict-bounds"
        );
        const options = {
          componentRestrictions: { country: "fr" },
          fields: ["formatted_address", "geometry", "name"],
          origin: map.getCenter(),
          strictBounds: false,
          types: ["establishment"],
        };
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
        const autocomplete = new google.maps.places.Autocomplete(
          input,
          options
        );
        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo("bounds", map);
        const infowindow = new google.maps.InfoWindow();
        const infowindowContent = document.getElementById("infowindow-content");
        infowindow.setContent(infowindowContent);
        const marker = new google.maps.Marker({
          map,
          anchorPoint: new google.maps.Point(0, -29),
        });
        autocomplete.addListener("place_changed", () => {
          infowindow.close();
          marker.setVisible(false);
          const place = autocomplete.getPlace();

          if (!place.geometry || !place.geometry.location) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert(
              "No details available for input: '" + place.name + "'"
            );
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
          infowindowContent.children["place-name"].textContent = place.name;
          infowindowContent.children["place-address"].textContent =
            place.formatted_address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          const radioButton = document.getElementById(id);
          radioButton.addEventListener("click", () => {
            autocomplete.setTypes(types);
            input.value = "";
          });
        }
        setupClickListener("changetype-all", []);
        setupClickListener("changetype-address", ["address"]);
        setupClickListener("changetype-establishment", ["establishment"]);
        setupClickListener("changetype-geocode", ["geocode"]);
        biasInputElement.addEventListener("change", () => {
          if (biasInputElement.checked) {
            autocomplete.bindTo("bounds", map);
          } else {
            // User wants to turn off location bias, so three things need to happen:
            // 1. Unbind from map
            // 2. Reset the bounds to whole world
            // 3. Uncheck the strict bounds checkbox UI (which also disables strict bounds)
            autocomplete.unbind("bounds");
            autocomplete.setBounds({
              east: 180,
              west: -180,
              north: 90,
              south: -90,
            });
            strictBoundsInputElement.checked = biasInputElement.checked;
          }
          input.value = "";
        });
        strictBoundsInputElement.addEventListener("change", () => {
          autocomplete.setOptions({
            strictBounds: strictBoundsInputElement.checked,
          });

          if (strictBoundsInputElement.checked) {
            biasInputElement.checked = strictBoundsInputElement.checked;
            autocomplete.bindTo("bounds", map);
          }
          input.value = "";
        });
      }
    </script>

@section('content')
<div id="core_home" >
<div class="core_prehome">
      <div id="text">
        <p id="click">
          Click and Collect, tout est dans le nom !
        </p>
        <p id="below_click">
          Consommez près de chez vous et facilement.
        </p>
      </div>
</div>

  <div class="search"> 
    <form action="{{route('searchProduct')}}">
      @csrf
      @if ($errors->any())
	<div class="alert alert-warning">
	Aucun de nos commerçants ne propose de {{old('search')}} &#9785;
	</div>
	@endif

      <div class="form-group">
        <input type="search" id="inputSearch" name="search" placeholder="Que recherchez-vous ?"> 
        @error('search')
        <div id="search_feedback" class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        <button type="submit" id="btnSearch">&#x1F50D;</button>

      </div>

    </form>
  </div>

        <div class="category">
          <ul>
            @foreach($categories as $category)
            <li>
              <a href="{{route('showProductsOfCategory',['id'=>$category->categoryid])}}">
                <img src="{{asset('storage/images/'.$category->categoryimage)}}">
              </a>
            </li>
            @endforeach
          </ul>
        </div>


        <div id="toutemap">
  <div class="pac-card" id="pac-card">
      <div>
        <div id="title">Nos commerçants</div>
          <div id="type-selector" class="pac-controls">
            <input
              type="radio"
              name="type"
              id="changetype-all"
              checked="checked"
            />
            <label for="changetype-all">Tous</label>

            <input type="radio" name="type" id="changetype-establishment" />
            <label for="changetype-establishment">Etablissements</label>

            <input type="radio" name="type" id="changetype-address" />
            <label for="changetype-address">Adresses</label>

            <input type="radio" name="type" id="changetype-geocode" />
            <label for="changetype-geocode">Geocodes</label>
          </div>
          <br />
          <div id="strict-bounds-selector" class="pac-controls">
            <input type="checkbox" id="use-location-bias" value="" checked />
            <label for="use-location-bias"> Rayon </label>
 <!--          <input type="range" id="use-location-bias" value="" />
          <label for="use-location-bias">Bias to map viewport</label> -->

            <input type="checkbox" id="use-strict-bounds" value="" />
            <label for="use-strict-bounds">Limites</label>
          </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text" placeholder="Entrez une adresse" />
      </div>
    </div>
    <div id="map"></div>
    
    <div id="infowindow-content">
      <span id="place-name" class="title"></span><br />
      <span id="place-address"></span>
    </div>

</div>

        <div id="product">
          <div id="tri">
            <p>Trier par :</p>
            <form method="GET" action="{{route('orderedProductsByDate')}}">
            @csrf
              <input class="btnTri" name="tridate" type="submit" value="Plus récent au plus ancien">
            </form>
            <form method="GET" action="{{route('orderedProducts')}}">
            @csrf
            <input class="btnTri" name="tricroi" type="submit" value="Prix : Croissant">
            </form>
            <form method="GET" action="{{route('orderedProductsByHigherPrice')}}">
            @csrf
            <input class="btnTri" name="tridecroi" type="submit" value="Prix : Décroissant">
            </form>
          </div>
        
        </div>

        <div class="products">
    @foreach($details as $detail)
  <div class="product-card">
  
      <div class="badge">
          {{ $detail->category}}
      </div>

      <div class="product-tumb">
          <img src="{{asset('storage/images/'.$detail->productimage)}}" alt="image">
      </div>

      <div class="product-details">
          <span class="product-catagory"> <a href="{{route('product',['id'=>$detail->productid, 'sellerId'=>$detail->sellerId])}}"> {{ $detail->productname }}</a></span>
          <h4>	<a href="{{route('showProductOfSeller',['id'=>$detail->sellerId])}}">{{ $detail->store}}</a></h4>
          <p>{{ $detail->productinfo }} </p>
          <div class="product-bottom-details">
              <div class="product-price">
                  {{ number_format($detail->productprice,2) }}€ 
              </div>
              
          </div>
      </div>
    
  </div>
  @endforeach
</div>





</div>
@endsection

<script async
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcj3fV0REAoMd7Q5gFJxYE-TWigPH_aeU&libraries=places&callback=initMap&v=weekly">
        </script>