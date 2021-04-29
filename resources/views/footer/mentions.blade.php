@extends('layouts.base')

@section('title', 'Mentions Légales')

@section('css')
  @parent
  <link href="{{ asset('css/footer/footer.css') }}" rel="stylesheet" type="text/css" />
  <style>
#core_mention{
  text-align : justify;
}

</style>
@endsection


@section('content')
        <div id="core_mention">
        
          <h1>Mentions Légales</h1>

          <hr></hr>
<br> </br>
          <p>Conformément aux dispositions de la loi n° 2004-575 du 21 juin 2004 pour la confiance en l’économie numérique, il est précisé aux utilisateurs du site localshop l’identité des différents intervenants dans le cadre de sa réalisation et de son suivi.</p>
<h5>Edition du site	</h5>

<span>Le site est édité par la société localshop, société par actions simplifiée au capital de 1.051,50 euros, dont le siège social est situé XX rue latimone 13000 Marseille , immatriculée au registre du commerce et des sociétés sous le numéro d’identification unique XXX XXX XXX RCS Marseille.</span>

<br> </br>

<h5>Responsables de publication</h5>
<span>Célia B / Lotfi H / Nahida Y / Mohcine Z </span>

<br> </br>
<h5>Nous contacter</h5>
<span>Par email : localshop@localshop.fr</span>
<br> </br>

<h5>CNIL</h5>
<p>La société localshop conservera dans ses systèmes informatiques et dans des conditions raisonnables de sécurité une preuve de la transaction comprenant le bon de commande et la facture.
La société localshop a fait l’objet d’une déclaration à la CNIL sous le numéro XXXXXX.
Conformément aux dispositions de la loi 88-98 du 6 janvier 1978 modifiée, l’Utilisateur dispose d’un droit d’accès, de modification et de suppression des informations collectées par localshop. Pour exercer ce droit, il reviendra à l’Utilisateur d’envoyer un message à l’adresse suivante :  localshop@localshop.fr </p>




        </div>
@endsection