<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


//---------------------- CADASTRO JOGADOR ----------------------------------
Route::get('/', 'JogadoresController@index')->name('index');

Route::post('/novo_jogador', 'JogadoresController@create')->name('novo_jogador');
Route::get('/jogoDaForca', 'JogadoresController@jogo')->name('jogo');
Route::get('/jogoRevelaLetra/{players_words_id}/{letra}', 'JogadoresController@jogoRevelaLetra')->name('jogoRevelaLetra');
Route::get('/palavraSessao/{palavra}', 'JogadoresController@palavraSessao')->name('palavraSessao');

//---------------------- EXIBE JOGADOR -------------------------------------
Route::get('/exibe_jogadores', 'AdminController@exibe_jogadores')->name('exibe_jogadores');

//---------------------- DELETA JOGADOR -------------------------------------
Route::get('/deleta_jogador/{id}', 'AdminController@deleta_jogador')->name('deleta_jogador');


//---------------------- CADASTRO CATEGORIA DE PALAVRA ----------------------------
Route::get('/categorias', 'CategoriasPalavrasController@nova_categoria')->name('index_categoria');
Route::post('/nova_categoria', 'CategoriasPalavrasController@create')->name('nova_categoria');

//---------------------- EXIBE CATEGORIAS DE PALAVRAS ----------------------------
Route::get('/exibe_categorias', 'CategoriasPalavrasController@exibe_categoriasPalavras')->name('index_categoria');

//---------------------- DELETA CATEGORIAS DE PALAVRAS ----------------------------
Route::get('/deleta_categoriaPalavra/{id}', 'CategoriasPalavrasController@deleta_categoriaPalavra')->name('deleta_categoria');

//---------------------- EXIBE PALAVRA POR ID --------------------------------------
Route::get('/exibe_palavra/{id}', 'CategoriasPalavrasController@busca_palavra')->name('busca_palavra');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


