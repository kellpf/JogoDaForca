<?php

namespace App\Http\Controllers;

use App\Models\Jogadores;
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
        return view('index');
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
        if (!Jogadores::where('name', $request->nick)->first() && $nick != null) {
            $jogador = new Jogadores();
            $jogador->name = $nick;
            $jogador->password = '312';
            $jogador->id_user_type = '2';
            $jogador->available_tips = '0';
            $jogador->punctuation = '0';
            $jogador->save();
        } else {
            $request->session()->flash('flash_erro', '');
        }

        return redirect()->route('index');
    }
}
