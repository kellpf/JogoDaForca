<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogadores;

class Ranking extends Controller
{
    public function index()
    {
        $jogadores = Jogadores::orderBy('punctuation', 'desc')->take(10)->get();

        return view('ranking', compact('jogadores'));
    }
}
