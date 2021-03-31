@extends('layouts.base')

@section('title', 'A propos')

@section('css')
  @parent
  <link href="{{ asset('css/footer/footer.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <div id="core_about">

        <h1>À propos</h1>

        <hr></hr>

        <div class="container-about">
            <div id="us">
                <h2>Qui somme nous ?</h2>
                <p>Local Shop est une place marché regroupant les producteurs locaux, en fonction de votre lieu de résidence. Local Shop a pour objectif de facilité l'accées au produits frais, locaux et de permettre une consommation plus respectueuse de l'environnement.<br>
                    Notre équipe : TOM.</p>
            </div>

            <div id="mission">
                <h2>Notre mission et nos engagements</h2>
                <p>Producteur, consommateur</p>
            </div>
        </div>

        </div>  
    
    @endsection