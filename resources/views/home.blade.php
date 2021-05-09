@extends('layouts.app')

@section('content')
<div class="container">
<nav class="navbar-dark bg-dark justify-content-lg-center d-flex">
        <a class="navbar-brand mr-3" href="{{route('exibe_jogadores')}}">Jogadores</a>
        <a class="navbar-brand">|</a>
        <a class="navbar-brand ml-1" href="{{route('index_categoria')}}">Manutenção de Palavras</a>
    </nav>
</div>
@endsection