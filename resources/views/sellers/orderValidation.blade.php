@extends('layouts.base') 

@section('title', 'Validez vos commandes') 

@section('css')
  @parent
  <link href="{{ asset('css/customers/cart.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ asset('css/customers/orders.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('content')


	
    
<div id="core_cart">
<h1>Mes commandes</h1>

<hr></hr>
<table id="cmdSeller"  >
    <tr class="cmdSeller">
        <td class="date">
            Date
        </td>
        <td> 

        </td>
        <td>
            Client
        </td>
        <td>
            Commande N°
        </td>
        <td>
            Produit
        </td>

        <td>
            Quantité
        </td>
        <td>
            Valider
        </td>
    </tr>
    <!-- i=0 -->
@foreach ($orders as $order)
                       
                           
<!-- i++ -->

                    <tr>
                        <td class="date">
                            {{$order->orderdate}}
                        </td>

                        <td>

                        </td>
                        <td>
                            {{ $order->customerid }} 
                             
                        </td>
                        <td>
                            {{$order->orderid}}
                        </td>

                        <td>
                            {{$order->productname}}
                        </td>

                        <td>
                            {{$order->orderproductquantity}}
                        </td>
                        
                        <td> 
                        @if($order->status==1)
                        <form method="POST" action="{{route('orderValidate.post', ['orderid'=>$order->orderid, 'customerid'=>$order->customerid, 'productid'=>$order->productid])}}" >
                            @csrf 
                                <button id="btnSearch" type="submit"  >A valider</button>
                            </form>
                        @else
                            <button id="btnRemise" type="submit" disabled="disabled" >Remise</button>
                        @endif

                        </td>
                                    
                             
                    </tr>
                   
 @endforeach
            </table>
            </div>

        @endsection
        