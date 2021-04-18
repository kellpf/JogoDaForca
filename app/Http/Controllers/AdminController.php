<?php

namespace App\Http\Controllers;

use App\Models\Jogadores;
use Illuminate\Http\Request;

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
        return view('deletaJogadores', ['jogadores' => $jogadores]);
    }

    public function deleta_jogador(Request $request){
        //dd($request->id);
        Jogadores::destroy($request->id);
        return 'Ok';
    }
}
