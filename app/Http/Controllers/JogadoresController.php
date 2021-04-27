<?php

namespace App\Http\Controllers;

use App\Models\CategoriasPalavras;
use App\Models\Jogadores;
use App\Models\Palavras;
use Illuminate\Http\Request;

class JogadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriaPalavras = CategoriasPalavras::all();
        return view('welcome', ['categoriaPalavras' => $categoriaPalavras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nick = $request->nick; // GET OF DATA 
        $group_word = $request->group_word;
        if ($group_word == 0) {
            $categoria = CategoriasPalavras::all()->random(1);
            $group_word = $categoria[0]->id;
        }
        $palavras = Palavras::where('group_id', $group_word)->get()->random(1);
        $letras = array();

        $dica = '';
        foreach ($palavras as $palavra) {
            $dica = $palavra->word_tip;
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

        if ($nick != 'bruno') {
            $jogador = new Jogadores();
            $jogador->name = $nick;
            $jogador->group_of_words_id = $group_word;
            $jogador->available_tips = '0';
            $jogador->punctuation = '0';
            $jogador->save();
        } else {
            $request->session()->flash('flash_erro', '');
        }

        return view('jogo', compact('dica', 'letras'));
    }
}
