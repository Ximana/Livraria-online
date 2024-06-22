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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//----------------------------Livraria---------------------------------
route::get('/', [Homecontroller::class, 'home'])->middleware(['auth', 'verified'])->name('home');


//-----------------------------------------------------------------

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboardAAA');


route::get('admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard');



//----------------------------Livro---------------------------------
Route::get('/admin/listarLivros', [LivroController::class, 'indexAdmin'])->name('livros.indexAdmin');

Route::get('/livros', [LivroController::class, 'index'])->name('livros.index');
Route::get('/admin/cadastrarLivro', [LivroController::class, 'create'])->name('livros.create');
Route::post('/livros', [LivroController::class, 'store'])->name('livros.store');
Route::get('/livros/{id}', [LivroController::class, 'show'])->name('livros.show');
Route::get('/livros/categoria/{categoria}', [LivroController::class, 'porCategoria'])->name('livros.categoria');
Route::get('/pesquisa', [LivroController::class, 'pesquisar'])->name('livros.pesquisar');
//----------------------------------------------------------

//---------------------------Autor---------------------------------
Route::get('/admin/listarAutor', [AutorController::class, 'index'])->name('autor.index');
Route::get('/admin/cadastrarAutor', [AutorController::class, 'create'])->name('autor.create');
Route::post('/autor', [AutorController::class, 'store'])->name('autor.store');
Route::get('/livros/{id}', [AutorController::class, 'show'])->name('livros.show');
Route::get('/livros/categoria/{categoria}', [AutorController::class, 'porCategoria'])->name('autor.categoria');
Route::get('/pesquisa', [AutorController::class, 'pesquisar'])->name('livros.pesquisar');
//----------------------------------------------------------

//---------------------------Categoria---------------------------------
Route::get('/admin/listarCategoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/admin/cadastrarCategoria', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria', [CategoriaController::class, 'store'])->name('categotia.store');
Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categotia.show');
//----------------------------------------------------------

//---------------------------Vendas---------------------------------


//----------------------------------------------------------


Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');

Route::get('/favoritos', [FavoritoController::class, 'index'])->name('favoritos.index');

Route::get('/sobre', function () {
    return view('livraria/sobre');
})->name('sobre');

Route::get('/contato', function () {
    return view('livraria/contato');
})->name('contato');