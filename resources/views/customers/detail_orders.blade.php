@extends('layouts.base')

@section('title', 'Mes commandes')

@section('css')
  @parent
  <link href="{{ asset('css/customers/orders.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@if(session('success'))
    <div class="msg">
    {{session('success')}}  &#128512;
    
    </div>
    @endif
<div id="core_order">

    <h1>Mes commandes</h1>

    <hr></hr>

    <div class="tables">
    <table class="table">
            <tr class="tableH">
                    <th>Commerce</th>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
               
            </tr>
            
                
            <tr class="body">
                 <!-- {{$Total =0}} -->
                 @foreach($detailOrders as $detailOrder)
                 <tr>
                <td>{{$detailOrder->storename}}</td>
                <td>{{$detailOrder->productname}}</td>
                <td>{{ number_format($detailOrder->productprice,2) }} €</td>
                <td>{{$detailOrder->orderproductquantity}}</td>
               
                <td>
                    <strong>{{$total=number_format($detailOrder->productprice * $detailOrder->orderproductquantity,2)}} € </strong>
                              <!--{{$Total+=$total}}    -->  
                </td>  
                <td>

                </td> 
                </tr>
                @endforeach

            </tr>
            <tfooter>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> Total</td>
                    <td> </td>
                    <td><strong> {{number_format($Total,2)}} €<strong></td>
                </tr>
            </tfooter>

</table>
</div>
    
</div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.0/gsap.min.js"></script>
	  <script src="{{ asset('js/footer/faq.js') }}"></script>
@endsection