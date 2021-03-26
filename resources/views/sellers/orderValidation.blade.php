@extends('layouts.base') 

@section('title', 'Validez vos commandes') 

<script>
function desactiver(id) {
id = document.getElementById('i');
id.disabled = "disabled";
}
</script>


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
            Prix
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
                            {{$order->productid}}
                        </td>

                        <td>
                            {{$order->productprice}}
                        </td>
                        
                        <td> 
                        <form method="POST" action="{{route('orderValidate.post', ['id'=>$order->customerid])}}" onsubmit="desactiver(i)">
                            @csrf 
                                <button id=i type="submit" class="btn btn-primary" >Valider</button>
                            </form>
                        </td>
                                    
                             
                    </tr>
 @endforeach
            </table>

        @endsection
        