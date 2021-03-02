@extends('layouts.app')

@section('title','Accueil')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach ($orders as $order)
        <div class="col-3">
            <article class="card">
                <header class="card-header">
                    <h1>{{ $order->customerId }}</h1>
                </header>
                <div class="card_body">
                    {{$order->price}}
                </div>
                <footer class="card-footer">
                    {{$order->orderDate}}
                </footer>
            </article>
        </div>   
         @endforeach
    </div>
</div>
@endsection