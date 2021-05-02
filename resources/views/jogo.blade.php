@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
<h1>Boa sorte {{$jogadores[0]->name}}!</h1><br>
</div>

<div id="divAcertos">
@for($i = 0; $i < strlen($word); $i++)
<input type="hidden" value="{{session('L'.$i)}}">
@endfor
<input id="palavraEmTelaAtual" type="hidden" value="{{session('palavraEmTela')}}">

<input id="erros" type="hidden" value="{{session('erros')}}">
<input id="acertos" type="hidden" value="{{session('acertos')}}">
<input id="validaLetra" type="hidden" value="{{session('validaLetra')}}">
<div class="row justify-content-center">
    <img src="{{ asset('storage/image/forca/'.session('erros').'.png') }}" alt="HTML5 Doctor Logo" width="200px" heidth="100px"/>
</div>
<br>
<div id="divLetrasUsadas" class="row justify-content-center">
    <input type="text" id="letrasUsadas" value="{{session('letrasEmTela')}}" style="width: 400px;" disabled>
</div>
<br><div id="divMensagem" style="display: ;" class="row justify-content-center alert alert-info" role="alert"></div>
</div>
<form method="post" actiion="#">
    {{ csrf_field() }}
    <div class="row justify-content-center" id="divAdivinharLetra">
        <br>
        <select id="adivinharLetra" type="text" onchange="revelaLetra(this.value);" onblur="palavraEmTela();">
            <option value=""></option>
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
            <option value="e">E</option>
            <option value="f">F</option>
            <option value="g">G</option>
            <option value="h">H</option>
            <option value="i">I</option>
            <option value="j">J</option>
            <option value="k">K</option>
            <option value="l">L</option>
            <option value="m">M</option>
            <option value="n">N</option>
            <option value="o">O</option>
            <option value="p">P</option>
            <option value="q">Q</option>
            <option value="r">R</option>
            <option value="s">S</option>
            <option value="t">T</option>
            <option value="u">U</option>
            <option value="v">V</option>
            <option value="w">W</option>
            <option value="x">X</option>
            <option value="y">Y</option>
            <option value="z">Z</option>
        </select>
        <br>
    </div>
    <br>
    <div class="row justify-content-center">
        <h2>{{$dica}}</h2>
    </div>
    <br>
    <div class="row justify-content-center">
        @for ($i = 0; $i < strlen($word); $i++)
            <input type="text" id="L{{$i}}" name="L{{$i}}" maxlength="1" value="{{ strtoupper($letras[$i]) == strtoupper(session('L'.$i)) ? strtoupper($letras[$i]) : '' }}" style="width: 50px; text-align: left;" disabled>
            {{-- Se todas as letras estão preenchidas, liberar botão pra próxima palavra --}}
        @endfor
    </div>
    <div class="row justify-content-center">
        <h3 id="letraCerta"></h3>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary">Continuar</button>
    </div>
</form>
</div>
@endsection

<script type="text/javascript">

function refreshDiv(){
    //Pegar o innerHtml, jogar numa variavel e jogar pra div
    var palavra = '{{strtolower($word)}}';
    var palavraEmTelaAtual = document.getElementById("palavraEmTelaAtual").value;
    if(document.getElementById('erros').value > 5) {
                document.getElementById("adivinharLetra").disabled = true;
                document.getElementById("divAdivinharLetra").style.display = "none";
/*                 document.getElementById("divMensagem").className = "";
                document.getElementById("divMensagem").className = "row justify-content-center alert alert-danger"; */
                document.getElementById("divMensagem").innerHTML = "<h3>Que pena, tente novamente!</h3>";
                //document.getElementById("divMensagem").style.display = "";
    }
    if(palavraEmTelaAtual.toLowerCase() == palavra) {
                document.getElementById("adivinharLetra").disabled = true;
/*                 document.getElementById("divMensagem").className = "";
                document.getElementById("divMensagem").className = "row justify-content-center alert alert-success"; */
                document.getElementById("divMensagem").innerHTML = "<h3>Parabéns, você ganhou!</h3>";
                //document.getElementById("divMensagem").style.display = "";
   }

    acertos = document.getElementById('validaLetra').value;
    letra = document.getElementById('adivinharLetra').value;

    if(acertos != '') {
        if(acertos*1 == 1) {
            document.getElementById("letraCerta").innerHTML = "Letra "+letra.toUpperCase()+" correta";
        } else {
            document.getElementById("letraCerta").innerHTML = "Letra "+letra.toUpperCase()+" incorreta";
        }
    }
    $("#divAcertos").load(" #divAcertos > *");
}

function bloqueiaInput(){
    refreshDiv();
    $("#divAcertos").load(" #divAcertos > *");
}
setInterval(bloqueiaInput, 1000);

function palavraEmTela(){
    var palavra = "";
    try { palavra = palavra + document.getElementById('L0').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L1').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L2').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L3').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L4').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L5').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L6').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L7').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L8').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L9').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L10').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L11').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L12').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L13').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L14').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L15').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L16').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L17').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L18').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L19').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L20').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L21').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L22').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L23').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L24').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L25').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L26').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L27').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L28').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L29').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L30').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L31').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L32').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L33').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L34').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L35').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L36').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L37').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L38').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L39').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L40').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L41').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L42').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L43').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L44').value; } catch(err) {}    try { palavra = palavra + document.getElementById('L45').value; } catch(err) {}
    if (window.XMLHttpRequest) {
        requisicao = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        requisicao = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var url = "/palavraSessao/" + palavra;
    requisicao.open("Get", url, true);
    requisicao.send(null);
}
setInterval(palavraEmTela, 1000);

function revelaLetra(letra) {

            if (window.XMLHttpRequest) {
            requisicao = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
            requisicao = new ActiveXObject("Microsoft.XMLHTTP");
            }

            var url = "/jogoRevelaLetra/" + {{$jogadoresPalavrasModel[0]->id}} + '/' + letra;

            requisicao.open("Get", url, true);
            //req.send();

            requisicao.onreadystatechange = function () {
            var resposta = requisicao.responseText;
            obj = JSON.parse(resposta);

            try { if(letra.toLowerCase() == obj[0].L1.toLowerCase()) { document.getElementById('L0').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L2.toLowerCase()) { document.getElementById('L1').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L3.toLowerCase()) { document.getElementById('L2').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L4.toLowerCase()) { document.getElementById('L3').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L5.toLowerCase()) { document.getElementById('L4').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L6.toLowerCase()) { document.getElementById('L5').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L7.toLowerCase()) { document.getElementById('L6').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L8.toLowerCase()) { document.getElementById('L7').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L9.toLowerCase()) { document.getElementById('L8').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L10.toLowerCase()) { document.getElementById('L9').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L11.toLowerCase()) { document.getElementById('L10').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L12.toLowerCase()) { document.getElementById('L11').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L13.toLowerCase()) { document.getElementById('L12').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L14.toLowerCase()) { document.getElementById('L13').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L15.toLowerCase()) { document.getElementById('L14').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L16.toLowerCase()) { document.getElementById('L15').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L17.toLowerCase()) { document.getElementById('L16').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L18.toLowerCase()) { document.getElementById('L17').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L19.toLowerCase()) { document.getElementById('L18').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L20.toLowerCase()) { document.getElementById('L19').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L21.toLowerCase()) { document.getElementById('L20').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L22.toLowerCase()) { document.getElementById('L21').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L23.toLowerCase()) { document.getElementById('L22').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L24.toLowerCase()) { document.getElementById('L23').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L25.toLowerCase()) { document.getElementById('L24').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L26.toLowerCase()) { document.getElementById('L25').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L27.toLowerCase()) { document.getElementById('L26').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L28.toLowerCase()) { document.getElementById('L27').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L29.toLowerCase()) { document.getElementById('L28').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L30.toLowerCase()) { document.getElementById('L29').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L31.toLowerCase()) { document.getElementById('L30').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L32.toLowerCase()) { document.getElementById('L31').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L33.toLowerCase()) { document.getElementById('L32').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L34.toLowerCase()) { document.getElementById('L33').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L35.toLowerCase()) { document.getElementById('L34').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L36.toLowerCase()) { document.getElementById('L35').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L37.toLowerCase()) { document.getElementById('L36').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L38.toLowerCase()) { document.getElementById('L37').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L39.toLowerCase()) { document.getElementById('L38').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L40.toLowerCase()) { document.getElementById('L39').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L41.toLowerCase()) { document.getElementById('L40').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L42.toLowerCase()) { document.getElementById('L41').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L43.toLowerCase()) { document.getElementById('L42').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L44.toLowerCase()) { document.getElementById('L43').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L45.toLowerCase()) { document.getElementById('L44').value = letra.toUpperCase(); } } catch(err) {}
            try { if(letra.toLowerCase() == obj[0].L46.toLowerCase()) { document.getElementById('L45').value = letra.toUpperCase(); } } catch(err) {}

            refreshDiv();

    };
    requisicao.send(null);

}

</script>

