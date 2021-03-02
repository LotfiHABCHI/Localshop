@extends('layouts.app')

@section('title','Accueil')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach ($detail_products as $detail)
        <div class="col-3">
            <article class="card">
                <header class="card-header">
                    <h1>{{"Produit" . " " . "N°" . " "  . $detail->productId }}</h1>
                </header>
                <div class="card_body">
                    {{"vendeur N°" . $detail->sellerId}}
                </div>
                <footer class="card-footer">
                    {{"stock = " . $detail->stock}}
                </footer>
            </article>
        </div>   
         @endforeach
    </div>
</div>
@endsection