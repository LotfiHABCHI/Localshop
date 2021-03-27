@extends('layouts.base')

@section('title','Accueil')
@section('content')

<style>
    .msg{
       margin-top: 10px;
       margin-bottom : 10px ;
    }
</style>
@if(session('success'))
    <div class="msg">
    {{session('success')}}  &#128512;
    
    </div>
    @endif

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
                
                                 {{$detail->productname}}      
                  </td>
                  
                        <td> 
                            @if($detail->categoryid==1 or $detail->categoryid==2 or $detail->categoryid==4)
                                {{ number_format($detail->productprice,2) }}€/kg
                            @else
                                {{ number_format($detail->productprice,2) }}€
                            @endif
                        </td>
                        <td>
                  {{$detail->orderproductquantity}}
                  </td>
                        <td>
                           <strong>{{$total=number_format($detail->productprice * $detail->orderproductquantity,2)}}€ </strong>
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

