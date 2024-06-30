<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\PagamentoController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LivroController;
use App\Http\Controllers\Api\UsuarioController;


// Rotas para livros
Route::get('livros', [LivroController::class, 'index']);
Route::get('livros/{id}', [LivroController::class, 'show']);
Route::post('livros', [LivroController::class, 'store']);
Route::put('livros/{id}', [LivroController::class, 'update']);
Route::delete('livros/{id}', [LivroController::class, 'destroy']);
Route::get('categorias/{id}/livros', [LivroController::class, 'livrosPorCategoria']);
Route::post('livros/pesquisar', [LivroController::class, 'pesquisar']);


// Rotas para pedidos
Route::get('pedidos', [PedidoController::class, 'index']);
Route::get('pedidos/{id}', [PedidoController::class, 'show']);
Route::post('pedidos', [PedidoController::class, 'store']);
Route::put('pedidos/{id}', [PedidoController::class, 'update']);
Route::delete('pedidos/{id}', [PedidoController::class, 'destroy']);

// Rotas para pagamentos
Route::get('pagamentos', [PagamentoController::class, 'index']);
Route::get('pagamentos/{id}', [PagamentoController::class, 'show']);
Route::post('pagamentos', [PagamentoController::class, 'store']);
Route::put('pagamentos/{id}', [PagamentoController::class, 'update']);
Route::delete('pagamentos/{id}', [PagamentoController::class, 'destroy']);

Route::get('teste', function(){
	return 'este e um teste';
});