@extends('layouts.base') 

@section('title', 'Validez vos commandes') 



@section('content')


	
    

<table class="table table-borderd table-responsive-sm">
    <tr>
        <td>
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
                        <td>
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
                                <button id=i type="submit" class="btn btn-primary" >Valider</button>
                            </form>
                        @else
                            <button id=i type="submit" class="btn btn-secondary" disabled="disabled" >Validée</button>
                        @endif

                        </td>
                                    
                             
                    </tr>
                   
 @endforeach
            </table>

        @endsection
        