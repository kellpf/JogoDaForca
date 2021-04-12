<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>

<body>
    <form action="{{route('nova_categoria')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="categoria">Categoria de palavra:</label>
        <input type="text" class="text" id="categoria" name="categoria">
        <input type="submit" value="enviar">
    </form>
    @if (Session::has('flash_erro'))
    <strong>Essa categoria ja existe</strong>
    @endif

</body>

</html>