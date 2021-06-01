@extends('layouts.app')

@section('content')
<div class="container">
<nav class="navbar-dark bg-dark justify-content-lg-center d-flex">
        <a class="mr-3 navbar-brand" href="{{route('exibe_jogadores')}}">Jogadores</a>
        <a class="navbar-brand">|</a>
        <a class="ml-1 navbar-brand" href="{{route('index_categoria')}}">Manter categorias de Palavras</a>
    </nav>
</div>
@endsection
