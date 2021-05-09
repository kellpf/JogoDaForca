<?php

namespace App\Http\Controllers;

use App\Models\CategoriasPalavras;
use App\Models\Palavras;
use Exception;
use Illuminate\Http\Request;

class CategoriasPalavrasController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function nova_categoria(Request $request)
    {
        $nameGroup = $request->group;
        $situacao = '';

        if (!CategoriasPalavras::where('group', $nameGroup)->first()) {
            try {
                $newGroup = new CategoriasPalavras();
                $newGroup->group = $nameGroup;
                $newGroup->save();
                //dd($newGroup->id);
                $situacao = 'sucesso';
            } catch (Exception $e) {
                $situacao = '';
            }
        } else {
            $situacao = 'erro';
        }
        return view('novaCategoria', compact('situacao'));
    }

    public function create(Request $request)
    {
        $categoria = $request->categoria;

        $catTeste = CategoriasPalavras::where('group', $request->categoria)->first();
        try {
            if (!CategoriasPalavras::where('group', $request->categoria)->first()) {
                $categoriaPalavra = new CategoriasPalavras();
                $categoriaPalavra->group = $categoria;
                $categoriaPalavra->save();
            } else {
                $request->session()->flash('flash_success', '');
            }
        } catch (Exception $e) {
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
        return view('palavras', compact('palavras', 'id'));
    }

    public function deleta_categoriaPalavra($id)
    {
        CategoriasPalavras::destroy($id);
        return redirect()->route('index_categoria');
    }

    public function nova_palavra(Request $request)
    {
        $group = CategoriasPalavras::where('id', $request->id)->get();

        return view('novaPalavra', compact('group'));
    }

    public function deleta_palavra($id)
    {
        $palavras = Palavras::destroy($id);
    }
}
