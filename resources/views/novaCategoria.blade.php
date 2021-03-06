<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>

<body>
    @extends('layouts.app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="ml-3 col-10">
                <button type="button" class="btn btn-dark">
                    <a class="nav-link" href="{{route('index_categoria')}}" style="color: white;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                        Voltar
                    </a>
                </button>
            </div>
        </div>

        

        <div class="mt-3 col-10">
            
            <div class="container p-4" style="background-color: white;">
                @if ($situacao)
                <div class="alert alert-info" role="alert">
                    {{$situacao}}
                  </div>
                @endif
               
               
                <div class="p-1 justify-content-lg-center d-flex">
                   
                    <form action="{{route('nova_categoria')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Grupo de Palavra</label>
                                <input type="text" class="form-control" id="group" name="group" placeholder="Nome do grupo de palavra" required>
                            </div>
                            <div class="text-center col">
                                <button type="submit" class="btn btn-dark">Cadastrar</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>
