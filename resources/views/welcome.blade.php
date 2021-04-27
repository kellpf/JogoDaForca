<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jogo da Forca</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>

@extends('layouts.app')

@section('content')
  
 <h3 class="mt-5 d-flex justify-content-center">Jogo da Forca</h3>

    <div class="form-group d-flex justify-content-center mt-5">
        <form action="{{route('novo_jogador')}}" method="post">

            {{csrf_field()}}

            @if (Session::has('flash_erro'))
            <div class="alert alert-danger" role="alert">

                Este apelido já é usado por outro jogador. Por favor, escolha outro.
            </div>
            @endif

            <div class="mb-3">
                <label for="nick" class="form-label" placeholder="Escolha um apelido">Apelido</label>
                <input type="text" class="form-control" id="nick" name="nick" required>
            </div>


            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="group_word" id="group_word">
                    <option selected value="0">Selecione uma palavra</option>
                    @foreach($categoriaPalavras as $categoriaPalavra)
                    <option value="{{$categoriaPalavra->id}}">{{$categoriaPalavra->id}}-{{$categoriaPalavra->group}}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark">Jogar</button>
            </div>
        </form>
    </div>


    @endsection

</body>

</html>