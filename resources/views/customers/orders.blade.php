@extends('layouts.base')

@section('title', 'Mes commandes')

@section('css')
  @parent
  <link href="{{ asset('css/customers/orders.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div id="core_order">

    <h1>Mes commandes</h1>

    <hr></hr>

    <div class="tables">
    <table class="table">
            <tr class="tableH">
                <td>N° de commande</td>
                <td>Prix total</td>
                <td>Date</td>
               
            </tr>
            @foreach($details as $detail)
            <tr class="body">
                <td><a href="{{route('detail_order',['orderId'=>$detail->orderid])}}"> {{ $detail->orderid }}<a></td>
                <td>{{ number_format($detail->orderprice,2)}} €</td>
                <td>{{$detail->orderdate}}</td>
                
                <td><!--{{$Total=0}}--></td>

                        

</tr>
@endforeach

</table>
</div>
    
</div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.0/gsap.min.js"></script>
	  <script src="{{ asset('js/footer/faq.js') }}"></script>
@endsection