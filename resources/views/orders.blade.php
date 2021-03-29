@extends('layouts.base')

@section('title','Accueil')
@section('content')


<table class="table table-borderd table-responsive-sm">
            <thead>
                <tr>
                    <th>N° de Commande</th>
                    <th>Nombre d'articles</th>
                    <th>Montant</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
           <!-- {{$Total =0}} -->
                @foreach ($details as $detail)
                    <tr>
                        <td>
                         <a href="{{route('detail_order',['orderId'=>$detail->orderid])}}"> {{ $detail->orderid }}<a>
                           
                        </td>
                        
                        <td>{{$detail->orderquantity}}</td>
                  
                        <td> 
                            {{number_format($detail->orderprice,2)}}€
                        </td>
                    
                        <td>
                        {{$detail->orderdate}}   
                        </td>          
                        <td>
                     
                        </td>
                    </tr>
                @endforeach
            </tbody>
            

        </table>


@endsection

