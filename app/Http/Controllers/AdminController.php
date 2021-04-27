<?php

namespace App\Http\Controllers;


use App\Models\Jogadores;
use Illuminate\Http\Request;
use App\Models\CategoriasPalavras;

class AdminController extends Controller
{

    // public function __construct()
    // {         
    //     $this->middleware('auth');     
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function exibe_jogadores(){
        $jogadores = Jogadores::all();
        return view('jogadores', ['jogadores' => $jogadores]);
    }

    public function deleta_jogador($id){
        Jogadores::destroy($id);
        return redirect()->route('exibe_jogadores');
    }

  
}
