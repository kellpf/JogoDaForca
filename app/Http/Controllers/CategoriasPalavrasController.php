<?php

namespace App\Http\Controllers;

use App\Models\CategoriasPalavras;
use App\Models\Palavras;
use Illuminate\Http\Request;

class CategoriasPalavrasController extends Controller
{

    // public function __construct()
    // {         
    //     $this->middleware('auth');     
    // }

    public function nova_categoria()
    {
        return view('novaCategoria');
    }

    public function create(Request $request)
    {
        $categoria = $request->categoria;

        if (!CategoriasPalavras::where('group', $request->categoria)->first()) {
            $categoriaPalavra = new CategoriasPalavras();
            $categoriaPalavra->group = $categoria;
            $categoriaPalavra->save();
        } else {
            $request->session()->flash('flash_erro', '');
        }
    }

    public function exibe_categoriasPalavras()
    {
        // $categoriaPalavras = CategoriasPalavras::join('words', 'group_id', '=', 'words.id')->select('word')->get();
        $categorias = CategoriasPalavras::all();
        // $palavras = Palavras::all();

        return view('exibeCategorias', compact('categorias'));
    }

    public function busca_palavra($id) 
    {
        $palavras = Palavras::where('group_id', $id)->get();
        return view('teste', compact('palavras'));
    }

    public function deleta_categoriaPalavra($id)
    {
        CategoriasPalavras::destroy($id);
        return redirect()->route('deleta_categoria');
    }
}
