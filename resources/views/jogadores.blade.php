@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#">Jogadores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Palavras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Grupo de Palavras</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <table class="table table-striped mt-4">
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