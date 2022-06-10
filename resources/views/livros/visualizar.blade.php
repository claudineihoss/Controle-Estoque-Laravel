@extends('layouts.template')
@section('title', 'Passaros')
@section('content')
<?php
?>
<div class="jumbotron">
  <h1 class="display-4"> {{$passaro->nome}} </h1>
  <p class="lead"><?php echo $passaro->cor; ?> - Valor R$ {{$passaro->valor}}</p>
  <hr class="my-4">
  <a class="btn btn-primary btn-lg" href="/" role="button">Ver Passaros</a>
</div>
@endsection