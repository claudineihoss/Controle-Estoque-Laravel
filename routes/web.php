<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\MovimentoController;
use App\Http\Controllers\ProdutoController;

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

Route::get('/',[MovimentoController::class,'index']);


// Rotas Tabela Produto

Route::get('livros',[LivroController::class,'index'])->name('livros');
Route::get('/produtos',[ProdutoController::class,'index'])->name('produtos');
Route::get('produtos.estoque',[ProdutoController::class,'estoque'])->name('estoque');
Route::get('produtos.create',[ProdutoController::class,'create'])->name('produtos.create');
Route::post('inserirproduto',[ProdutoController::class,'store'])->name('produtos.insert');
Route::get('produtos/{produto}/visualizar',[ProdutoController::class,'edit'])->name('produtos.visualizar');
Route::put('produtos/update/{produto}',[ProdutoController::class,'update'])->name('produtos.atualizar');
Route::get('produtos/{produto}/delete', [ProdutoController::class, 'modal'])->name('produtos.modal');
Route::delete('produtos/{produto}',[ProdutoController::class,'destroy'])->name('produtos.delete');

// Rota Tabela Movimentos
Route::get('movimentos',[MovimentoController::class,'index'])->name('movimentos');
Route::get('movimentos.create',[MovimentoController::class,'create'])->name('movimentos.create');
Route::post('movimentos.insert',[MovimentoController::class,'store'])->name('movimentos.insert');
Route::get('movimentos/estoque/{produto}',[MovimentoController::class,'estoque'])->name('movimentos.estoque');
Route::get('movimentos/{movimento}/delete', [MovimentoController::class, 'modal'])->name('movimentos.modal');
Route::delete('movimentos/{movimento}/excluir',[MovimentoController::class,'destroy'])->name('movimentos.delete');