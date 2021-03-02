@extends('layouts.app')

@section('title','Accueil')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        @foreach ($customers as $customer)
        <div class="col-3">
            <article class="card">
                <header class="card-header">
                     {{ $customer->all() }}
                </header>
                <div class="card_body">
                    {{$customer->lastname ." ". $customer->firstname }}
                    
                </div>
                
            </article>
        </div>   
         @endforeach
    </div>
</div>
@endsection

