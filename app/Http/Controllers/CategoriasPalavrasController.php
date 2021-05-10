<?php

namespace App\Http\Controllers;

use App\Models\CategoriasPalavras;
use App\Models\Dicas;
use App\Models\Palavras;
use Exception;
use Illuminate\Support\Facades\DB;
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
                $situacao = 'Grupo de palavra adicionado com sucesso!';
            } catch (Exception $e) {
                $situacao = '';
            }
        } else {
            $situacao = 'Esse grupo de palavra já existe!';
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
        $status = '';
        $group = CategoriasPalavras::where('id', $request->id)->get();

        return view('novaPalavra', compact('group', 'status', 'request'));
    }

    public function cadastro_nova_palavra(Request $request)
    {
        $status = '';
        $palavra = $request->word;
        $idGrupoPalavra = $request->idGroup;
        $dica = $request->hint;

        $palavraCadastrada = Palavras::where('word', $palavra)->get();

        $id = 0;
        foreach($palavraCadastrada as $palavras) {
            $id = $palavras->id;
        }

        if($id == 0) {
            $novaPalavra = new Palavras();
            $novaPalavra->word = $palavra;
            $novaPalavra->group_id = $idGrupoPalavra;
            $novaPalavra->word_tip = $dica;
            $novaPalavra->save();

            $dicaPalavra = new Dicas();
            $dicaPalavra->word_id = $novaPalavra->id;
            $dicaPalavra->tip = $dica;
            $dicaPalavra->save();
            $status = 'Palavra adicionada com sucesso!';
        } else {
            $status = 'Essa palavra já existe!';
        }
        return redirect()->route('nova_palavra', ['id' => $idGrupoPalavra, 'status' => $status]);
    }

    public function deleta_palavra($id)
    {
        $words = DB::select('select group_id from words where id = ?', [$id]);
        $group_id = 1;
        foreach($words as $word) {
            $group_id = $word->group_id;
        }
        $palavras = Palavras::destroy($id);
        return redirect()->route('busca_palavra', ['id' => $group_id]);
    }
}
