@extends('layouts.base')

@section('title', 'Accueil')

@section('css')
  @parent
  <link href="{{ asset('css/sellers/seller.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/home/home.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/map.css') }}" rel="stylesheet" type="text/css" />

@endsection


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

        <div id="products">
        @foreach ($details as $detail)
            <div class="product_card">
            
              <div class="imgC">
                <a href="{{route('product',['id'=>$detail->productid, 'sellerId'=>$detail->sellerId])}}">
                  <img src="{{asset('storage/images/'.$detail->productimage)}}" alt="image">
                </a>
              </div>

              <hr>
              <div class="txtproduct">
                <p class="categoryN">
                {{$detail->categoryname}}

                </p>


                <p class="storeN">
                <a href="{{route('showProductOfSeller',['id'=>$detail->sellerId])}}">{{$detail->store}}</a>

                </p>

                <p class="productN">
                  <a href="{{route('product',['id'=>$detail->productid, 'sellerId'=>$detail->sellerId])}}">
                  {{$detail->productname}}
                  </a>
                </p>
                
                
                <div class="info_product">{{$detail->productinfo}}</div>
                <div class="price_product">{{number_format($detail->productprice,2)}}€/pièce</div>
              </div>
              
            </div>
      @endforeach
      </div>

      </div>
    </div>
@endsection

@section('script')
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
<script async
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcj3fV0REAoMd7Q5gFJxYE-TWigPH_aeU&libraries=places&callback=initMap&v=weekly">
        </script>
@endsection