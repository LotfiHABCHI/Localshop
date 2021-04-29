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
                    Notre équipe : </p>
                    <h2>Celia B</h2>
                    <p>Après un Doctorat en Biologie/Santé spécialité Maladies Infectieuses, et ayant été amené à analyser mes données à l’aide du langage R durant ma thèse, j’ai découvert ma passion pour le code. Ce qui m’a emmené à m’inscrire en Master 2 CCI. Mon projet professionnel est de travailler dans des sociétés d’Edition de logiciels pour la santé.
</p>
<br>
<h2>Lotfi H</h2>
                    <p>Diplômé d’un master en chimie moléculaire, j’ai décidé d’enrichir ma formation scientifique avec le Master CCI. N’ayant jamais programmé, cette formation m’a permis d’apprendre les bases de la programmation et de prendre goût à celle-ci.
</p>
<br>
<h2>Nahida Y</h2>
                    <p>Diplômée d’un Master Géologie des réservoirs j’ai décidé, afin de compléter ma formation et suite aux conseils d’une de mes professeures, d’intégrer le Master CCI. J’ai toujours été intéressée par la programmation et c’est un plus en recherche comme en modélisation réservoirs d’avoir cette compétence.
</p>
<br>
<h2>Mohcine Z</h2>
                    <p>Je suis diplômé d’un master 2 thermique et l’énergie. Je souhaite compléter mes connaissances en informatique et plus particulièrement dans développement-web, cela m’a permettais de faire la ‘’ reconversion ‘’ vers le domaine de l’informatique pour ouvrir des nouvelles opportunités dans le monde professionnel</p>
    

</div>

            <div id="mission">
                <h2>Notre mission et nos engagements</h2>
                <p>Relier les consommateurs aux producteurs artisanaux de la région de Marseille pour une consommation plus éco-responsable en privilégiant des produit locaux et de saison. </p>
            </div>
        </div>

        </div>  
    
    @endsection


   



