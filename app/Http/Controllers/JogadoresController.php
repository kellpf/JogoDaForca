<?php

namespace App\Http\Controllers;

use App\Models\CategoriasPalavras;
use App\Models\Jogadores;
use App\Models\JogadoresPalavrasModel;
use App\Models\Palavras;
use App\Models\Dicas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class JogadoresController extends Controller
{
    public function index()
    {
        $categoriaPalavras = CategoriasPalavras::all();
        return view('welcome', ['categoriaPalavras' => $categoriaPalavras]);
    }

    public function create(Request $request)
    {
        $request->session()->flush();
        $nick = $request->nick; // GET OF DATA
        session(['nick' => $nick]);
        $group_word = $request->group_word;
        session(['is_randon_group_word' => $group_word]);
        if ($group_word == 0) {
            $categoria = CategoriasPalavras::
            join('words', 'words.group_id', 'group_of_words.id')
            ->get()
            ->random(1);
            $group_word = $categoria[0]->id;
        }
        session(['group_word' => $group_word]);

        /* Início palavra inicial */

        $palavras = Palavras::where('group_id', $group_word)->get()->random(1);
        $letras = array();

        $dica = '';
        foreach ($palavras as $palavra) {
            $dica = $palavra->word_tip;
            $idPalavra = $palavra->id;
            $word = $palavra->word;
        }

        for ($i = 0; $i < strlen($word); $i++) {
            $letras[$i] = $word[$i];
        }

        $nameJogador = Jogadores::where('name', $request->nick)->get();
        $consultaJogador = null;
        foreach ($nameJogador as $name) {
            $consultaJogador = $name->name;
        }

        if (strtolower(trim($nick)) != strtolower(trim($consultaJogador))) {
            $jogador = new Jogadores();
            $jogador->name = $nick;
            $jogador->group_of_words_id = $group_word;
            $jogador->available_tips = '0';
            $jogador->punctuation = '0';
            $jogador->save();

            $jogadorPalavra = new JogadoresPalavrasModel();
            $jogadorPalavra->player_id = $jogador->id;
            $jogadorPalavra->word_id = $idPalavra;
            $jogadorPalavra->status = '0';
      try { $jogadorPalavra->L1 = $letras[0]; } catch (Exception $e) {}
      try { $jogadorPalavra->L2 = $letras[1]; } catch (Exception $e) {}
      try { $jogadorPalavra->L3 = $letras[2]; } catch (Exception $e) {}
      try { $jogadorPalavra->L4 = $letras[3]; } catch (Exception $e) {}
      try { $jogadorPalavra->L5 = $letras[4]; } catch (Exception $e) {}
      try { $jogadorPalavra->L6 = $letras[5]; } catch (Exception $e) {}
      try { $jogadorPalavra->L7 = $letras[6]; } catch (Exception $e) {}
      try { $jogadorPalavra->L8 = $letras[7]; } catch (Exception $e) {}
      try { $jogadorPalavra->L9 = $letras[8]; } catch (Exception $e) {}
      try { $jogadorPalavra->L10 = $letras[9]; } catch (Exception $e) {}
      try { $jogadorPalavra->L11 = $letras[10]; } catch (Exception $e) {}
      try { $jogadorPalavra->L12 = $letras[11]; } catch (Exception $e) {}
      try { $jogadorPalavra->L13 = $letras[12]; } catch (Exception $e) {}
      try { $jogadorPalavra->L14 = $letras[13]; } catch (Exception $e) {}
      try { $jogadorPalavra->L15 = $letras[14]; } catch (Exception $e) {}
      try { $jogadorPalavra->L16 = $letras[15]; } catch (Exception $e) {}
      try { $jogadorPalavra->L17 = $letras[16]; } catch (Exception $e) {}
      try { $jogadorPalavra->L18 = $letras[17]; } catch (Exception $e) {}
      try { $jogadorPalavra->L19 = $letras[18]; } catch (Exception $e) {}
      try { $jogadorPalavra->L20 = $letras[19]; } catch (Exception $e) {}
      try { $jogadorPalavra->L21 = $letras[20]; } catch (Exception $e) {}
      try { $jogadorPalavra->L22 = $letras[21]; } catch (Exception $e) {}
      try { $jogadorPalavra->L23 = $letras[22]; } catch (Exception $e) {}
      try { $jogadorPalavra->L24 = $letras[23]; } catch (Exception $e) {}
      try { $jogadorPalavra->L25 = $letras[24]; } catch (Exception $e) {}
      try { $jogadorPalavra->L26 = $letras[25]; } catch (Exception $e) {}
      try { $jogadorPalavra->L27 = $letras[26]; } catch (Exception $e) {}
      try { $jogadorPalavra->L28 = $letras[27]; } catch (Exception $e) {}
      try { $jogadorPalavra->L29 = $letras[28]; } catch (Exception $e) {}
      try { $jogadorPalavra->L30 = $letras[29]; } catch (Exception $e) {}
      try { $jogadorPalavra->L31 = $letras[30]; } catch (Exception $e) {}
      try { $jogadorPalavra->L32 = $letras[31]; } catch (Exception $e) {}
      try { $jogadorPalavra->L33 = $letras[32]; } catch (Exception $e) {}
      try { $jogadorPalavra->L34 = $letras[33]; } catch (Exception $e) {}
      try { $jogadorPalavra->L35 = $letras[34]; } catch (Exception $e) {}
      try { $jogadorPalavra->L36 = $letras[35]; } catch (Exception $e) {}
      try { $jogadorPalavra->L37 = $letras[36]; } catch (Exception $e) {}
      try { $jogadorPalavra->L38 = $letras[37]; } catch (Exception $e) {}
      try { $jogadorPalavra->L39 = $letras[38]; } catch (Exception $e) {}
      try { $jogadorPalavra->L40 = $letras[39]; } catch (Exception $e) {}
      try { $jogadorPalavra->L41 = $letras[40]; } catch (Exception $e) {}
      try { $jogadorPalavra->L42 = $letras[41]; } catch (Exception $e) {}
      try { $jogadorPalavra->L43 = $letras[42]; } catch (Exception $e) {}
      try { $jogadorPalavra->L44 = $letras[43]; } catch (Exception $e) {}
      try { $jogadorPalavra->L45 = $letras[44]; } catch (Exception $e) {}
      try { $jogadorPalavra->L46 = $letras[45]; } catch (Exception $e) {}
            $jogadorPalavra->save();
            session(['jogadorId' => $jogador->id]);

            $this->zeraSessoes();
            session(['sequenciaDeVitorias' => 0]);
            session(['dicasDisponiveis' => 0]);
            session(['dicasUsadas' => 0]);
            session(['btnDicas' => 'disabled']);

        /* Início palavra inicial */

            #return view('jogo', compact('dica', 'letras'));
            return redirect('/jogoDaForca');

        } else {
            $request->session()->flash('flash_erro', '');
            $categoriaPalavras = CategoriasPalavras::all();
            //return view('welcome', ['categoriaPalavras' => $categoriaPalavras]);
            return redirect('/');
        }

    }

public function jogo() {

    $jogadorId = session('jogadorId');
    if($jogadorId ==null ) {
        return redirect('/');
    } else {

    $jogadores = Jogadores::where('id', $jogadorId)->get();
    $jogadoresPalavrasModel = JogadoresPalavrasModel::where('player_id', $jogadorId)->where('status', 0)->get();
    try {
        $palavras = Palavras::where('id', $jogadoresPalavrasModel[0]->word_id)->get();
        $dicasDasPalavras = Dicas::where('word_id', $jogadoresPalavrasModel[0]->word_id)->get();
    } catch (Exception $e) { return view('tryJogo'); }
    $letras = array();
    $dica = '';
    foreach ($palavras as $palavra) {
        $dica = $palavra->word_tip;
        $idPalavra = $palavra->id;
        $word = $palavra->word;
    }
    session(['word' => $word]);
    for ($i = 0; $i < strlen($word); $i++) {
        $letras[$i] = $word[$i];
    }
   return view('jogo', compact('jogadores', 'jogadoresPalavrasModel', 'dica', 'word', 'letras', 'dicasDasPalavras'));

}

}

public function palavraSessao(Request $request) {
    session(['palavraEmTela' => $request->palavra]);
    return $request->palavra;
}

public function jogoRevelaLetra(Request $request) {

    $acertos = 0;
    $sessionAcertos = session('acertos');

    $jogadoresPalavrasModel = JogadoresPalavrasModel::where('id', $request->players_words_id)->get();
    $palavras = Palavras::where('id', $jogadoresPalavrasModel[0]->word_id)->get()->random(1);
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L1)) { session(['L0' => strtoupper($jogadoresPalavrasModel[0]->L1)]);    $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L2)) { session(['L1' => strtoupper($jogadoresPalavrasModel[0]->L2)]);    $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L3)) { session(['L2' => strtoupper($jogadoresPalavrasModel[0]->L3)]);    $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L4)) { session(['L3' => strtoupper($jogadoresPalavrasModel[0]->L4)]);    $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L5)) { session(['L4' => strtoupper($jogadoresPalavrasModel[0]->L5)]);    $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L6)) { session(['L5' => strtoupper($jogadoresPalavrasModel[0]->L6)]);    $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L7)) { session(['L6' => strtoupper($jogadoresPalavrasModel[0]->L7)]);    $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L8)) { session(['L7' => strtoupper($jogadoresPalavrasModel[0]->L8)]);    $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L9)) { session(['L8' => strtoupper($jogadoresPalavrasModel[0]->L9)]);    $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L10)) { session(['L9' => strtoupper($jogadoresPalavrasModel[0]->L10)]);    $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L11)) { session(['L10' => strtoupper($jogadoresPalavrasModel[0]->L11)]);  $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L12)) { session(['L11' => strtoupper($jogadoresPalavrasModel[0]->L12)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L13)) { session(['L12' => strtoupper($jogadoresPalavrasModel[0]->L13)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L14)) { session(['L13' => strtoupper($jogadoresPalavrasModel[0]->L14)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L15)) { session(['L14' => strtoupper($jogadoresPalavrasModel[0]->L15)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L16)) { session(['L15' => strtoupper($jogadoresPalavrasModel[0]->L16)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L17)) { session(['L16' => strtoupper($jogadoresPalavrasModel[0]->L17)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L18)) { session(['L17' => strtoupper($jogadoresPalavrasModel[0]->L18)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L19)) { session(['L18' => strtoupper($jogadoresPalavrasModel[0]->L19)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L20)) { session(['L19' => strtoupper($jogadoresPalavrasModel[0]->L20)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L21)) { session(['L20' => strtoupper($jogadoresPalavrasModel[0]->L21)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L22)) { session(['L21' => strtoupper($jogadoresPalavrasModel[0]->L22)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L23)) { session(['L22' => strtoupper($jogadoresPalavrasModel[0]->L23)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L24)) { session(['L23' => strtoupper($jogadoresPalavrasModel[0]->L24)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L25)) { session(['L24' => strtoupper($jogadoresPalavrasModel[0]->L25)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L26)) { session(['L25' => strtoupper($jogadoresPalavrasModel[0]->L26)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L27)) { session(['L26' => strtoupper($jogadoresPalavrasModel[0]->L27)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L28)) { session(['L27' => strtoupper($jogadoresPalavrasModel[0]->L28)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L29)) { session(['L28' => strtoupper($jogadoresPalavrasModel[0]->L29)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L30)) { session(['L29' => strtoupper($jogadoresPalavrasModel[0]->L30)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L31)) { session(['L30' => strtoupper($jogadoresPalavrasModel[0]->L31)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L32)) { session(['L31' => strtoupper($jogadoresPalavrasModel[0]->L32)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L33)) { session(['L32' => strtoupper($jogadoresPalavrasModel[0]->L33)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L34)) { session(['L33' => strtoupper($jogadoresPalavrasModel[0]->L34)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L35)) { session(['L34' => strtoupper($jogadoresPalavrasModel[0]->L35)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L36)) { session(['L35' => strtoupper($jogadoresPalavrasModel[0]->L36)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L37)) { session(['L36' => strtoupper($jogadoresPalavrasModel[0]->L37)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L38)) { session(['L37' => strtoupper($jogadoresPalavrasModel[0]->L38)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L39)) { session(['L38' => strtoupper($jogadoresPalavrasModel[0]->L39)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L40)) { session(['L39' => strtoupper($jogadoresPalavrasModel[0]->L40)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L41)) { session(['L40' => strtoupper($jogadoresPalavrasModel[0]->L41)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L42)) { session(['L41' => strtoupper($jogadoresPalavrasModel[0]->L42)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L43)) { session(['L42' => strtoupper($jogadoresPalavrasModel[0]->L43)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L44)) { session(['L43' => strtoupper($jogadoresPalavrasModel[0]->L44)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L45)) { session(['L44' => strtoupper($jogadoresPalavrasModel[0]->L45)]); $acertos++; } } catch (Exception $e) {}
    try { if(strtolower($request->letra) == strtolower($jogadoresPalavrasModel[0]->L46)) { session(['L46' => strtoupper($jogadoresPalavrasModel[0]->L46)]); $acertos++; } } catch (Exception $e) {}

    if($acertos == 0) {
        session(['erros' => (session('erros')+1)]);
        session(['acertos' => 0]);
        session(['validaLetra' => 0]);
    } else {
        session(['acertos' => 1]);
        session(['validaLetra' => 1]);
    }
    $letrasEmTela = session('letrasEmTela').'-'.strtoupper($request->letra);
    session(['letrasEmTela' => ($letrasEmTela)]);
    session(['ultimobotaoclicado' => $request->letra]);
    session([''.$request->letra => 'disabled']);
    session(['acertos' => 0]);
    $word = session('word');
    for($i = 0; $i < strlen($word); $i++) {
        if(!empty(session('L'.$i))) {
           session(['acertos' => session('acertos')+1]);
        }
    }
    if(session('erros') > 5) {
        session(['divMensagemShow' => '']);
        session(['divMensagem' => 'Que pena, tente novamente!']);
    } else if(strlen($word) == session('acertos')) {
        session(['divMensagemShow' => '']);
        session(['divMensagem' => 'Parabéns, você ganhou!']);
    } else {
        session(['divMensagemShow' => 'none']);
        session(['divMensagem' => '']);
    }


    #Corrigir: quando seleciona uma letra já usada, soma os acertos de novo;
    return $jogadoresPalavrasModel;

}

public function carregarPalavra() {

    #$palavras = Palavras::where('group_id', $group_word)->whereRaw("NOT EXISTS (SELECT * FROM players_words WHERE players_words.word_id = words.id AND players_words.player_id = ".session('jogadorId').")")->get()->random(1);
try {

    $group_word = session('is_randon_group_word');
    if ($group_word == '0') {
        $categoria = CategoriasPalavras::
        join('words', 'words.group_id', 'group_of_words.id')
        ->get()
        ->random(1);
        $group_word = $categoria[0]->id;
    }
    session(['group_word' => $group_word]);

        $palavras = DB::select('SELECT * FROM words WHERE NOT EXISTS (
        SELECT * FROM players_words WHERE players_words.word_id = words.id AND players_words.player_id = ?
        ) and group_id = ?
        LIMIT 1
        ', [session('jogadorId'), $group_word]);

        $letras = array();

        $dica = '';
        foreach ($palavras as $palavra) {
            $dica = $palavra->word_tip;
            $idPalavra = $palavra->id;
            $word = $palavra->word;
        }
        session(['word' => $word]);

        for ($i = 0; $i < strlen($word); $i++) {
            $letras[$i] = $word[$i];
        }

    $jogadorPalavra = new JogadoresPalavrasModel();
    $jogadorPalavra->player_id = session('jogadorId');
    $jogadorPalavra->word_id = $idPalavra;
    $jogadorPalavra->status = '0';
try { $jogadorPalavra->L1 = $letras[0]; } catch (Exception $e) {}  try { $jogadorPalavra->L2 = $letras[1]; } catch (Exception $e) {}  try { $jogadorPalavra->L3 = $letras[2]; } catch (Exception $e) {}  try { $jogadorPalavra->L4 = $letras[3]; } catch (Exception $e) {}  try { $jogadorPalavra->L5 = $letras[4]; } catch (Exception $e) {}  try { $jogadorPalavra->L6 = $letras[5]; } catch (Exception $e) {}  try { $jogadorPalavra->L7 = $letras[6]; } catch (Exception $e) {}  try { $jogadorPalavra->L8 = $letras[7]; } catch (Exception $e) {}  try { $jogadorPalavra->L9 = $letras[8]; } catch (Exception $e) {}  try { $jogadorPalavra->L10 = $letras[9]; } catch (Exception $e) {}  try { $jogadorPalavra->L11 = $letras[10]; } catch (Exception $e) {}  try { $jogadorPalavra->L12 = $letras[11]; } catch (Exception $e) {}  try { $jogadorPalavra->L13 = $letras[12]; } catch (Exception $e) {}  try { $jogadorPalavra->L14 = $letras[13]; } catch (Exception $e) {}  try { $jogadorPalavra->L15 = $letras[14]; } catch (Exception $e) {}  try { $jogadorPalavra->L16 = $letras[15]; } catch (Exception $e) {}  try { $jogadorPalavra->L17 = $letras[16]; } catch (Exception $e) {}  try { $jogadorPalavra->L18 = $letras[17]; } catch (Exception $e) {}  try { $jogadorPalavra->L19 = $letras[18]; } catch (Exception $e) {}  try { $jogadorPalavra->L20 = $letras[19]; } catch (Exception $e) {}  try { $jogadorPalavra->L21 = $letras[20]; } catch (Exception $e) {}  try { $jogadorPalavra->L22 = $letras[21]; } catch (Exception $e) {}  try { $jogadorPalavra->L23 = $letras[22]; } catch (Exception $e) {}  try { $jogadorPalavra->L24 = $letras[23]; } catch (Exception $e) {}  try { $jogadorPalavra->L25 = $letras[24]; } catch (Exception $e) {}  try { $jogadorPalavra->L26 = $letras[25]; } catch (Exception $e) {}  try { $jogadorPalavra->L27 = $letras[26]; } catch (Exception $e) {}  try { $jogadorPalavra->L28 = $letras[27]; } catch (Exception $e) {}  try { $jogadorPalavra->L29 = $letras[28]; } catch (Exception $e) {}  try { $jogadorPalavra->L30 = $letras[29]; } catch (Exception $e) {}  try { $jogadorPalavra->L31 = $letras[30]; } catch (Exception $e) {}  try { $jogadorPalavra->L32 = $letras[31]; } catch (Exception $e) {}  try { $jogadorPalavra->L33 = $letras[32]; } catch (Exception $e) {}  try { $jogadorPalavra->L34 = $letras[33]; } catch (Exception $e) {}  try { $jogadorPalavra->L35 = $letras[34]; } catch (Exception $e) {}  try { $jogadorPalavra->L36 = $letras[35]; } catch (Exception $e) {}  try { $jogadorPalavra->L37 = $letras[36]; } catch (Exception $e) {}  try { $jogadorPalavra->L38 = $letras[37]; } catch (Exception $e) {}  try { $jogadorPalavra->L39 = $letras[38]; } catch (Exception $e) {}  try { $jogadorPalavra->L40 = $letras[39]; } catch (Exception $e) {}  try { $jogadorPalavra->L41 = $letras[40]; } catch (Exception $e) {}  try { $jogadorPalavra->L42 = $letras[41]; } catch (Exception $e) {}  try { $jogadorPalavra->L43 = $letras[42]; } catch (Exception $e) {}  try { $jogadorPalavra->L44 = $letras[43]; } catch (Exception $e) {}  try { $jogadorPalavra->L45 = $letras[44]; } catch (Exception $e) {}  try { $jogadorPalavra->L46 = $letras[45]; } catch (Exception $e) {}
    $jogadorPalavra->save();
    $this->zeraSessoes();
    for($i=0;$i<46;$i++) {
        session(['L'.$i => '']);
    }

} catch (Exception $e) {
    #Calcular pontos e zerar sessão
    return view('tryJogo');
}


}

public function zeraSessoes() {

    session(['erros' => 0]);
    session(['acertos' => 0]);
    session(['letrasEmTela' => '']);
    session(['palavraEmTela' => '']);
    session(['validaLetra' => '']);
#            session(['pontuacao' => 0]);
    session(['dicas' => 0]);

    session(['Q' => '']);            session(['W' => '']);            session(['E' => '']);            session(['R' => '']);
    session(['T' => '']);            session(['Y' => '']);            session(['U' => '']);            session(['I' => '']);
    session(['O' => '']);            session(['P' => '']);            session(['A' => '']);            session(['S' => '']);
    session(['D' => '']);            session(['F' => '']);            session(['G' => '']);            session(['H' => '']);
    session(['J' => '']);            session(['K' => '']);            session(['L' => '']);            session(['Ç' => '']);
    session(['Z' => '']);            session(['X' => '']);            session(['C' => '']);            session(['V' => '']);
    session(['B' => '']);            session(['N' => '']);            session(['M' => '']);

    session(['divMensagemShow' => '']);
    session(['divMensagem' => '']);
    session(['btnDicas' => '']);

}
public function atualizarDadosDaPartida(Request $request) {

        #Jogadores Pontos

        if(session('erros') > 5) {
            $this->sequenciaDoJogo('parar');
        } else {
            $this->sequenciaDoJogo('continuar');
        }

        $this->salvaPontuacao();

        DB::update('update players_words set status = 1 where player_id = ? and status = ?', [session('jogadorId'), 0]);
        if(session('sequenciaDoJogo') == 'continuar') {
            $this->sequenciaDeVitorias();
            $this->carregarPalavra();

                return redirect('/jogoDaForca');

        } else {
                return view('gameOver');
        }

}

public function sequenciaDoJogo($sequenciaDoJogo) {
    session(['sequenciaDoJogo' => $sequenciaDoJogo]);
}

public function salvaPontuacao() {
    if(session('sequenciaDoJogo') == 'parar'){
        #se errou a palavra
            DB::update("update players set punctuation = punctuation + (? * 5) where id = ?", [session('acertos'), session('jogadorId')]);
    } else if(session('sequenciaDoJogo') == 'continuar') {
        #se acertou a palavra
            DB::update("update players set punctuation = punctuation + 100 where id = ?", [session('jogadorId')]);
    }

}

public function sequenciaDeVitorias() {
    session(['sequenciaDeVitorias' => session('sequenciaDeVitorias')+1]); //Adicona uma vitória
    $mod = session('sequenciaDeVitorias') % 2; //Pega o resto da divisão
    if($mod == 0) { //Se for redondo, ouseja, vitória em sequência, adiciona uma dica
        $this->adicionaDica();
    }
}
public function adicionaDica() {
    if(session('dicasUsadas') < 3 ) {
        session(['dicasDisponiveis' => session('dicasDisponiveis')+1]);
    }
}

public function pedeDica() {
    if(session('dicasDisponiveis') > 0  && session('dicasDisponiveis') < 4 && session('dicasUsadas') < 3) {
        session(['dicasDisponiveis' => session('dicasDisponiveis')-1]);
        session(['dicasUsadas' => session('dicasUsadas')+1]);
    }
    session(['btnDicas' => 'disabled']);
    return 'Dicas!';
}

}

/*
Diferencial:
A cada duas palavras, ganha uma dica
Dicas, limite de 3 dicas
Só pode usar uma dica por palavra
*/
