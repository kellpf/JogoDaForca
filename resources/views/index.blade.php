<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>

<body>
    <form action="{{route('novo_jogador')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="apelido">Nick: </label>
        <input type="text" class="text" id="nick" name="nick">
        <input type="submit" value="enviar">
    </form>
    @if (Session::has('flash_erro'))
    <strong>Este apelido já é usado por outro usuário. Por favor, escolha outro</strong>
    @endif

</body>

</html>