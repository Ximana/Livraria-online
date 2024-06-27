<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PedidoController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/favoritos/adicionar/{livro}', [FavoritoController::class, 'adicionar'])->name('favoritos.adicionar');
    Route::delete('/favoritos/{favorito}', [FavoritoController::class, 'remover'])->name('favoritos.remover')->middleware('auth');
    Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');
});

require __DIR__.'/auth.php';

//----------------------------Livraria---------------------------------
route::get('/', [Homecontroller::class, 'home'])->name('home');


//-----------------------------------------------------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboardAAA');


route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard');



//----------------------------Livro---------------------------------
Route::resource('livros', LivroController::class);
Route::get('/livros/livraria/{id}', [LivroController::class, 'livroLivraria'])->name('livros.livraria');

Route::get('/livro/{livro}', [LivroController::class, 'livroDetalhe'])->name('livro.livroDetalhe');

Route::get('/admin/listarLivros', [LivroController::class, 'indexAdmin'])->name('livros.indexAdmin');

Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');
Route::get('/admin/cadastrarLivro', [LivroController::class, 'create'])->name('livros.create');
Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');
Route::get('/livros/{id}/edit', [LivroController::class, 'edit'])->name('livros.edit');
Route::put('/livros/{id}', [LivroController::class, 'update'])->name('livros.update');
Route::delete('/livros/{id}', [LivroController::class, 'destroy'])->name('livros.destroy');

Route::get('/livros/{id}', [LivroController::class, 'show'])->name('livros.show');
Route::get('/livros/categoria/{id}', [LivroController::class, 'livrosPorCategoria'])->name('livros.categoria');
Route::get('/pesquisa', [LivroController::class, 'pesquisar'])->name('livros.pesquisar');
//----------------------------------------------------------

//---------------------------Autor---------------------------------
Route::get('/admin/cadastrarAutor', [AutorController::class, 'create'])->name('autores.create');
Route::post('/autores', [AutorController::class, 'store'])->name('autores.store');
Route::get('/admin/listarAutor', [AutorController::class, 'index'])->name('autores.index');

Route::get('/editar-autor/{id}', [AutorController::class, 'editarAutor'])->name('autores.editar');
Route::put('/atualizar-autor/{id}', [AutorController::class, 'atualizarAutor'])->name('autores.atualizar');
Route::delete('/remover-autor/{id}', [AutorController::class, 'removerAutor'])->name('autores.remover');



//----------------------------------------------------------

//---------------------------Categoria---------------------------------
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/admin/listarCategoria', [CategoriaController::class, 'index'])->name('categorias.index');

Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
//----------------------------------------------------------

//-------------------------Carrinho---------------------------------


Route::post('/carrinho/adicionar/{livroId}', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::delete('/carrinho/{id}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');


//----------------------------------------------------------



//-------------------------Pedido---------------------------------


Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::get('/pedidos/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');


//----------------------------------------------------------





Route::get('/sobre', function () {
    return view('livraria/sobre');
})->name('sobre');

Route::get('/contato', function () {
    return view('livraria/contato');
})->name('contato');