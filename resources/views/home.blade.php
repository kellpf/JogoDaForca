@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('exibe_jogadores')}}">Jogadores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Palavras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Grupo de Palavras</a>
            </li>
        </ul>
    </div>
</div>
@endsection