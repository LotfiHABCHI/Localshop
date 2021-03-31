@extends('layouts.base')

@section('title', 'Votre Facture')

@section('css')
  @parent
  <link href="{{ asset('css/log/orders.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div id="core_order">
  
  <h1>Merci de votre achat !</h1>

  <hr>

<p>Voici le récapitulatif de votre commande </p> <!-- si possible mettre le num de commande et date -->
<table class="table">
        <thead>
            <tr>
                <td>Produit</td>
                <td>Quantité</td>
                <td>Prix unitaire</td>
                <td>Prix total</td>
            </tr>
        </thead>

        <tbody>
        @foreach ($content as $product)
            <tr>
                <td>
                    {{ $product->name }}
                </td>

                <td>
                    {{ $product->quantity }}                       
                </td>

                <td> 
                    {{ number_format($product->price,2) }}€
                </td>

                <td>
                    {{ number_format($product->price * $product->quantity,2) }}€
                </td>       
            </tr>
        @endforeach
        </tbody>

        <tfooter>
            <tr>
                <td></td>
                <td></td>
                <td>Sous total</td>
                <td>{{ number_format($total, 2) }}€</td>
            </tr>
        </tfooter>

    </table>

</div>
@endsection