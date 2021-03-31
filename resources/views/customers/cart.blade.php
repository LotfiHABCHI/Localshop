@extends('layouts.base')

@section('title', 'Panier')

@section('css')
  @parent
  <link href="{{ asset('css/customers/cart.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <div id="core_cart">

    <h1>Panier</h1>

    <hr></hr>

    <table class="table">
        <thead>
            <tr>
                <td>Produit</td>
                <td>Quantité</td>
                <td>Prix unitaire</td>
                <td>Prix total</td>
                <td><form method="POST" action="{{route('cart.clear')}}">
                    @csrf
                        <input id="btnSearch" name="search" type="submit" value="Vider">
                    </form><td>
            </tr>
        </thead>

        <tbody>
        @foreach ($content as $product)
            <tr>
                <td>
                    <img src="{{asset('storage/images/'.$product->attributes['image'])}}">
                    {{ $product->name }}
                </td>

                <td>
                    <form method="POST" action="{{ route('cart.update', $product->id) }}" class="cart_update">
                    @csrf
                        <div>
                            <input name="quantity" type="number" style="height: 2rem" min="1" max="99" value="{{ $product->quantity }}">
                            <input class="cart_update" value="&#10004" type="submit">
                        </div>
                    </form>                        
                </td>

                <td> 
                    {{ number_format($product->price,2) }}€
                </td>

                <td>
                    {{ number_format($product->price * $product->quantity,2) }}€
                </td>   

                <td>
                    <form method="POST" action="{{ route('cart.destroy', $product->id) }}" class="cart_supp">
                    @csrf
                        <input class="cart_supp" value="&#10060" type="submit">
                    </form>
                </td>      
            </tr>
        @endforeach
        </tbody>

        <tfooter>
            <tr>
                @if($count == 0)
                <td>Aucun produit</td>
                @elseif($count == 1)
                <td>{{$count}} produit</td>
                @else
                <td>{{$count}} produits</td>
                @endif
                <td></td>
                <td>Sous total</td>
                <td>{{ number_format($total, 2) }}€</td>
            </tr>

            
        </tfooter>
        

    </table>
            <div id="pay">
                <form method="GET" action="{{ route('checkout.index')}}" class="pay">
                    @csrf
                        <input class="pay" value="Passer commande" type="submit">
                    </form>
            </div>
    </div>
@endsection