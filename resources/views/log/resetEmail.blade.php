@extends('layouts.base')

@section('title', 'Cliquez pour changer de mot de passe')

@section('css')
  @parent
  <link href="{{ asset('css/log/resetPassword.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <a href="http://localhost:8000/resetPassword">Cliquez ici pour réinitialiser votre mot de passe</a>
@endsection