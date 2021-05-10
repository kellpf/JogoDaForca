@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="navbar-dark bg-dark justify-content-lg-center d-flex">
        <a class="navbar-brand mr-3" href="{{route('exibe_jogadores')}}">Jogadores</a>
        <a class="navbar-brand">|</a>
        <a class="navbar-brand ml-1" href="{{route('index_categoria')}}">Manutenção de Palavras</a>
    </nav>

    <div class="row">
        <h4 class="ml-1 mt-4" style="color: gray;">Jogadores</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Jogador</th>
                    <th scope="col">Pontuação</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jogadores as $jogador)
                <tr>

                    <th scope="row">{{ $jogador->id }}</th>
                    <td>{{ $jogador->name }}</td>
                    <td>{{ $jogador->punctuation }}</td>
                    <td>
                        <a href="{{route('deleta_jogador', ['id'=>$jogador->id])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection