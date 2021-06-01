<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <title>Palavras</title>
</head>

<body>

  @extends('layouts.app')
  @section('content')

  <div class="row ">
    <div class="ml-5 col-10">
        <button type="button" class="btn btn-dark">
            <a href="/exibe_palavra/{{$request->id}}" style="color: white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
                Voltar
            </a>
        </button>
    </div>
</div>
<br>
  <div class="col-7 container p-3 mt-2" style="background-color: white;">
    @if($request->status)
            <div class="alert alert-info" role="alert">
                {{$request->status}}
            </div>
    @endif
    <form action="{{route('cadastro_palavra')}}" method="post">
      {{csrf_field()}}

      <div class="mb-3">
        @foreach($group as $p)
        <label for="exampleInputEmail1" class="form-label">Categoria</label>
        <input type="hidden" readonly value="{{$p->id}}"  class="form-control" name="idGroup" id="idGroup" aria-describedby="emailHelp" >
        <input type="text" readonly  placeholder="{{$p->group}}" class="form-control"  aria-describedby="emailHelp" >
        @endforeach
      </div>
      <div class="mb-3">
        <label for="word" class="form-label">Palavra</label>
        <input type="text" class="form-control" id="word" name="word" onkeypress="return lettersOnly(event);" required>
      </div>
      <div class="mb-3">
        <label for="hint" class="form-label">Dica</label>
        <input type="text" class="form-control" id="hint" name="hint" required>
      </div>
      <div class="text-center">
      <button type="submit" class="btn btn-dark">Cadastrar</button>
      </div>
    </form>
  </div>
  @endsection
</body>

<script>

    function lettersOnly(evt) {
        evt = (evt) ? evt : event;
        var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
            ((evt.which) ? evt.which : 0));
        if (charCode > 31 && (charCode < 65 || charCode > 90) &&
            (charCode < 97 || charCode > 122)) {
            alert("Atenção! Digite apenas letras!");
            return false;
        }
        return true;
    }

</script>


</html>
