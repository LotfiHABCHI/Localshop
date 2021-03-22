@extends('layouts.base')

@section('title','Accueil')
@section('content')


<table class="table table-borderd table-responsive-sm">
            <thead>
                <tr>
                    <th>Commerce</th>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Prix total</th>
                </tr>
            </thead>
            <tbody>
           <!-- {{$Total =0}} -->
                @foreach ($detailOrder as $detail)
                    <tr>
                        <td>
                            {{ $detail->storename }}
                        </td>
                        <td>
                
                                 {{$detail->name}}      
                  </td>
                  
                        <td> 
                            @if($detail->catId==1 or $detail->catId==2 or $detail->catId==4)
                                {{ number_format($detail->price,2) }}€/kg
                            @else
                                {{ number_format($detail->price,2) }}€
                            @endif
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
                    <td> Total</td>
                    <td> </td>
                    <td><strong> {{$Total}}€<strong></td>
                </tr>
            </tfooter>

        </table>


@endsection

