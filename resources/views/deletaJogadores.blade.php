<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibe Jogadores</title>
</head>

<body>
    <table>
        <thead>
            <th>Apelido</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($jogadores as $jogador)
            <td>{{ $jogador->name }}</td>
            <td><a href="{{route('deleta_jogador', ['id'=>$jogador->id])}}">Deletar</a></td>
            @endforeach
        </tbody>
    </table>
</body>

</html>