@extends('layouts.base')

@section('title','Accueil')
@section('content')


<table class="table table-borderd table-responsive-sm">
            <thead>
                <tr>
                    <td>Commande</td>
                    <td>Produit</td>
                    <td>Prix unitaire</td>
                    <td>Quantité</td>
                    <td>prix total</td>
                </tr>
            </thead>
            <tbody>
           <!-- {{$Total =0}} -->
                @foreach ($details as $detail)
                    <tr>
                        <td>
                            {{ $detail->orderId }}
                            ({{ $detail->firstname }})
                        </td>
                        <td>
                
                                 {{$detail->productId}}      
                  </td>
                  
                        <td> 
                            {{number_format($detail->price,2)}}€
                        </td>
                        <td>
                  {{$detail->quantity}}
                  </td>
                        <td>
                           <strong>{{$total=number_format($detail->price * $detail->quantity,2)}}€ </strong>
                              <!--{{$Total+=$total}}    -->  
                        </td>          
                        <td>
                     
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td> </td>
                    <td></td>
                    <td> total</td>
                    <td> </td>
                    <td> {{$Total}}</td>
                </tr>
            </tfooter>

        </table>


@endsection

