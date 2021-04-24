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
        if(empty($group_word)){
            $categoria = CategoriasPalavras::all()->random(1);
            $group_word = $categoria[0]->id;
        }
        if (!Jogadores::where('name', $request->nick)->first() && $nick != null) {
            $jogador = new Jogadores();
            $jogador->name = $nick;
            $jogador->group_of_words_id = $group_word;
            $jogador->available_tips = '0';
            $jogador->punctuation = '0';
            $jogador->save();
        } else {
            $request->session()->flash('flash_erro', 'teste');
        }
        return redirect()->route('index');
    }
}
