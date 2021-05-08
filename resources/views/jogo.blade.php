@extends('layouts.app')

<title>Jogo da Forca</title>
@section('content')
<div class="row justify-content-center">
<h1>Boa sorte {{$jogadores[0]->name}}!</h1><br>
</div>

<div id="divAcertos">
@for($i = 0; $i < strlen($word); $i++)
<input type="hidden" id="letraR{{$i}}" value="{{session('L'.$i)}}">
@endfor
<input id="palavraEmTelaAtual" type="hidden" value="{{session('palavraEmTela')}}">

<input id="erros" type="hidden" value="{{session('erros')}}">
<input id="acertos" type="hidden" value="{{session('acertos')}}">
<input id="validaLetra" type="hidden" value="{{session('validaLetra')}}">
<input id="ultimaLetra" type="hidden" value="{{session('ultimobotaoclicado')}}">
<div id="dicasDoUsuario" class="row justify-content-center">
    <img src="{{ asset('storage/image/forca/'.session('erros').'.png') }}" alt="HTML5 Doctor Logo" width="200px" heidth="100px"/>
</div>

<div class="row justify-content-center">
    <img src="{{ asset('storage/image/dicas/'.'U'.session('dicasUsadas').'.png') }}" alt="HTML5 Doctor Logo" width="200px" heidth="100px"/>
</div>
<div id="dicasDisponiveis" class="row justify-content-center">
    <span>Dicas Disponíveis: </span><input type="text" id="dicasDisponiveis" style="width: 18px;" value="{{session('dicasDisponiveis')}}" style="width: 400px;" disabled>
    @if(session('dicasDisponiveis') > 0)
        <button id="btnDicas" type="button" class="btn btn-warning" onclick="pedirUmadica();" {{session('btnDicas')}}><strong>Pedir Dica</strong></button>
    @endif
</div>
<div class="row justify-content-center">
    <span>Letras Já Utilizadas</span>
</div>
<div id="divLetrasUsadas" class="row justify-content-center">
    <input type="text" id="letrasUsadas" value="{{session('letrasEmTela')}}" style="width: 400px;" disabled>
</div>
<br><div id="divMensagem" style="display: {{session('divMensagemShow')}};" class="row justify-content-center alert alert-info" role="alert"><h3>{{session('divMensagem')}}</h3></div>
</div>
<form method="" action="/atualizarDadosDaPartida">
    {{ csrf_field() }}
{{--     <div class="row justify-content-center" id="divAdivinharLetra"> --}}
        {{-- G #00FA9A --}}
        {{-- R #E9967A --}}
        <div class="row justify-content-center" id="divAdivinharLetra">
        <button type='button' id='Q' value='Q' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('Q')}}>Q</button>
        <button type='button' id='W' value='W' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('W')}}>W</button>
        <button type='button' id='E' value='E' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('E')}}>E</button>
        <button type='button' id='R' value='R' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('R')}}>R</button>
        <button type='button' id='T' value='T' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('T')}}>T</button>
        <button type='button' id='Y' value='Y' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('Y')}}>Y</button>
        <button type='button' id='U' value='U' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('U')}}>U</button>
        <button type='button' id='I' value='I' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('I')}}>I</button>
        <button type='button' id='O' value='O' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('O')}}>O</button>
        <button type='button' id='P' value='P' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('P')}}>P</button></div>
        <div class="row justify-content-center" id="divAdivinharLetra">
        <button type='button' id='A' value='A' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('A')}}>A</button>
        <button type='button' id='S' value='S' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('S')}}>S</button>
        <button type='button' id='D' value='D' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('D')}}>D</button>
        <button type='button' id='F' value='F' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('F')}}>F</button>
        <button type='button' id='G' value='G' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('G')}}>G</button>
        <button type='button' id='H' value='H' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('H')}}>H</button>
        <button type='button' id='J' value='J' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('J')}}>J</button>
        <button type='button' id='K' value='K' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('K')}}>K</button>
        <button type='button' id='L' value='L' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('L')}}>L</button>
        <button type='button' id='Ç' value='Ç' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('Ç')}}>Ç</button></div>
        <div class="row justify-content-center" id="divAdivinharLetra">
        <button type='button' id='Z' value='Z' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('Z')}}>Z</button>
        <button type='button' id='X' value='X' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('X')}}>X</button>
        <button type='button' id='C' value='C' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('C')}}>C</button>
        <button type='button' id='V' value='V' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('V')}}>V</button>
        <button type='button' id='B' value='B' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('B')}}>B</button>
        <button type='button' id='N' value='N' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('N')}}>N</button>
        <button type='button' id='M' value='M' style='background-color: #ADD8E6;' onclick="revelaLetra(this.value);" {{session('M')}}>M</button></div>

        <br>
{{--     </div> --}}
    <div class="row justify-content-center">
        <h2>{{$dica}}</h2>
    </div>
    <div id="letrasVisiveis" class="row justify-content-center">
        @for ($i = 0; $i < strlen($word); $i++)
            <input type="text" id="L{{$i}}" name="L{{$i}}" maxlength="1" value="{{ strtoupper($letras[$i]) == strtoupper(session('L'.$i)) ? strtoupper($letras[$i]) : '' }}" style="width: 50px; text-align: left;" disabled>
            {{-- Se todas as letras estão preenchidas, liberar botão pra próxima palavra --}}
        @endfor
    </div>
    <div class="row justify-content-center">
        <h3 id="letraCerta"></h3>
    </div>
    <div class="row justify-content-center">
        <button id="sequenciaDoJogo" name="sequenciaDoJogo" type="submit" class="btn btn-primary" style="display: none;">Continuar</button>
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
                //document.getElementById("adivinharLetra").disabled = true;
                //document.getElementById("divAdivinharLetra").style.display = "none";
/*                 document.getElementById("divMensagem").className = "";
                document.getElementById("divMensagem").className = "row justify-content-center alert alert-danger"; */
//                document.getElementById("divMensagem").innerHTML = "<h3>Que pena, tente novamente!</h3>";
                document.getElementById("sequenciaDoJogo").style.display = "";
    }
    if(palavraEmTelaAtual.toLowerCase() == palavra) {
                //document.getElementById("adivinharLetra").disabled = true;
/*                 document.getElementById("divMensagem").className = "";
                document.getElementById("divMensagem").className = "row justify-content-center alert alert-success"; */
//                document.getElementById("divMensagem").innerHTML = "<h3>Parabéns, você ganhou!</h3>";
                document.getElementById("sequenciaDoJogo").style.display = "";
   }

    acertos = document.getElementById('validaLetra').value;
    letra = document.getElementById('ultimaLetra').value;
    //letra = document.getElementById('adivinharLetra').value;

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
setInterval(bloqueiaInput, 5000);

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


function pedirUmadica(){
    if (window.XMLHttpRequest) {
        requisicao = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        requisicao = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var url = "/pedeDica";
    requisicao.open("Get", url, true);
    requisicao.send();
          @forelse ($dicasDasPalavras as $dica)
              alert('Dica: {{$dica->tip}}');
          @empty
              alert('Dica não cadastrada!');
          @endforelse
          document.getElementById("btnDicas").disabled = true;
}


function revelaLetra(letra) {

            document.getElementById(""+letra.toUpperCase()).disabled = true;

            if (window.XMLHttpRequest) {
            requisicao = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
            requisicao = new ActiveXObject("Microsoft.XMLHTTP");
            }

            var url = "/jogoRevelaLetra/" + {{$jogadoresPalavrasModel[0]->id}} + '/' + letra;

            requisicao.open("Get", url, true);
            //req.send();

    requisicao.send(null);

    for(i=0; i<46;i++) {
                try { document.getElementById('L'+i).value = document.getElementById('letraR'+i).value } catch(err) {}
            }            refreshDiv();
                        $("#letrasVisiveis").load(" #letrasVisiveis > *");


    palavraEmTela();
}
</script>

