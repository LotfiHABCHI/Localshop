@extends('layouts.base')

@section('title','Accueil')
@section('content')


<table class="table table-borderd table-responsive-sm">
            <thead>
                <tr>
                    <th>N° de Commande</th>
                    <th>Montant</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
           <!-- {{$Total =0}} -->
                @foreach ($details as $detail)
                    <tr>
                        <td>
                         <a href="{{route('detail_order',['orderId'=>$detail->orderId])}}"> {{ $detail->orderId }}<a>
                           
                        </td>
                        
                  
                        <td> 
                            {{number_format($detail->oprice,2)}}€
                        </td>
                    
                        <td>
                        {{$detail->orderDate}}   
                        </td>          
                        <td>
                     
                        </td>
                    </tr>
                @endforeach
            </tbody>
            

        </table>


@endsection

