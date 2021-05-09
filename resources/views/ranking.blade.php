@extends('layouts.app')

<title>Jogo da Forca</title>
@section('content')
<div class="row justify-content-center">
    <a style="font-size: 20px;" href="/">Jogar Novamente</a>
</div>
<center>
<div style="width: 500px;">
@php $i = 1; @endphp
    <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Jogador</th>
            <th scope="col">Pontuação</th>
          </tr>
        </thead>
        <tbody>
    @forelse ($jogadores as $jogador)
    <tr>
        <th scope="row">{{$i}}</th>
        <td>{{$jogador->name}}</td>
        <td>{{$jogador->punctuation}}</td>
    </tr>
    @php $i++; @endphp

    @empty

@endforelse
        </tbody>
      </table>

</div>
</center>

@endsection

