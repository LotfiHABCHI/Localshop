@extends('layouts.app')

@section('title','Accueil')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach ($detail_orders as $detail)
        <div class="col-3">
            <article class="card">
                <header class="card-header">
                    <h1>{{"commande" . " " . "N°" . " "  . $detail->orderId }}</h1>
                </header>
                <div class="card_body">
                    {{"Produit N°" . $detail->productId}}
                </div>
                <footer class="card-footer">
                    {{"quantité = " . $detail->quantity}}
                </footer>
            </article>
        </div>   
         @endforeach
    </div>
</div>
@endsection