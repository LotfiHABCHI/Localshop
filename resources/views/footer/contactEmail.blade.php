@extends('layouts.base')

@section('title', 'Contact')

@section('css')
  @parent
  <link href="{{ asset('css/log/contact.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<div id="core_contact">
  
  <h1>Prise de contact</h1>

  <hr>

  <p>Réception d'une prise de contact avec les éléments suivants :</p>

  <ul>
    <li><strong>Nom</strong> : {{ $contact['firstname'] }}</li>
    <li><strong>Prénom</strong> : {{ $contact['lastname'] }}</li>
    <li><strong>Email</strong> : {{ $contact['email'] }}</li>
    <li><strong>Message</strong> : {{ $contact['message'] }}</li>
  </ul>

</div>
@endsection