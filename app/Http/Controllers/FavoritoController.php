<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    public function adicionar(Request $request, $livroId)
    {
        // Verifica se há um usuário logado
    if (!Auth::check()) {
        return redirect()->back()->with('error', 'Você precisa estar logado para adicionar itens como favorito.');
    }

        // Verificar se o livro já está marcado como favorito pelo usuário
    if ($request->user()->favoritos()->where('livro_id', $livroId)->exists()) {
        return redirect()->back()->with('status', 'Este livro já está nos seus favoritos.');
    }

    // Adicionar o livro aos favoritos
    $favorito = new Favorito();
    $favorito->user_id = $request->user()->id;
    $favorito->livro_id = $livroId; // Usar o $livroId recebido como parâmetro
    $favorito->save();

    return redirect()->back()->with('status', 'Livro adicionado aos favoritos com sucesso.');

    }

    public function remover(Favorito $favorito)
{
    


    $favorito->delete();

    return redirect()->route('favoritos.index')->with('success', 'Livro removido dos favoritos com sucesso.');
}

    public function index()
    {
        $user = auth()->user();
    $favoritos = $user->favoritos()->with('livro.autores', 'livro.categorias')->paginate(10);

    return view('livraria.favoritos', compact('favoritos'));
    }
}
