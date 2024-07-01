<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\PagamentoController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LivroController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\CategoriaController;

// Rotas para livros
Route::prefix('livros')->group(function () {
    Route::get('/', [LivroController::class, 'index']);
    Route::get('/{id}', [LivroController::class, 'show']);
    Route::post('/', [LivroController::class, 'store']);
    Route::put('/{id}', [LivroController::class, 'update']);
    Route::delete('/{id}', [LivroController::class, 'destroy']);
    Route::post('/pesquisar', [LivroController::class, 'pesquisar']);
	Route::get('/categoria/{id}', [LivroController::class, 'livrosPorCategoria']);
});


// Rotas para Autores
Route::prefix('autores')->group(function () {
    Route::get('/', [AutorController::class, 'index']);
    Route::post('/', [AutorController::class, 'store']);
    Route::get('/{id}', [AutorController::class, 'show']);
    Route::put('/{id}', [AutorController::class, 'update']);
    Route::delete('/{id}', [AutorController::class, 'destroy']);
});
// Rotas para Categorias
Route::prefix('categorias')->group(function () {
    Route::get('/', [CategoriaController::class, 'index']);
    Route::post('/', [CategoriaController::class, 'store']);
    Route::get('/{id}', [CategoriaController::class, 'show']);
    Route::put('/{id}', [CategoriaController::class, 'update']);
    Route::delete('/{id}', [CategoriaController::class, 'destroy']);
});

// Rotas para Usuarios
Route::prefix('usuarios')->group(function () {
    Route::post('/cadastrar', [UsuarioController::class, 'cadastrar']);
    Route::post('/login', [UsuarioController::class, 'login']);
    Route::post('/logout', [UsuarioController::class, 'logout'])->middleware('auth:sanctum');
});

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