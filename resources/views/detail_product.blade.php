@extends('layouts.app')

@section('title','Accueil')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach ($details as $detail)
        <div class="col-3">
            <article class="card">
                <header class="card-header">
                    <h1>{{ $detail->productId }}</h1>
                </header>
                <div class="card_body">
                    {{$detail->SellerId}}
                </div>
                <footer class="card-footer">
                    {{$detail->stock}}
                </footer>
            </article>
        </div>   
         @endforeach
    </div>
</div>
@endsection