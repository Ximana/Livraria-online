<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro; // Importe o modelo Livro
use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;


class CarrinhoController extends Controller
{
    public function index(){

        // Obtém todos os itens no carrinho do usuário logado, com os detalhes do livro
    $carrinhoItens = Carrinho::with('livro')
                            ->where('user_id', Auth::id())
                            ->get();

    // Calcula o total
    $total = $carrinhoItens->sum(function($item) {
        return $item->livro->preco * $item->quantidade;
    });

    return view('livraria.carrinho', compact('carrinhoItens', 'total'));

        
    }

     public function adicionar(Request $request, $livroId)
{
    // Valida a quantidade
    $request->validate([
        'quantidade' => 'required|integer|min:1'
    ]);

    // Busca o livro pelo ID
    $livro = Livro::find($livroId);

    // Verifica se o livro existe
    if (!$livro) {
        return redirect()->back()->with('error', 'Livro não encontrado.');
    }

    // Verifica se o livro já está no carrinho do usuário logado
    $carrinhoExistente = Carrinho::where('user_id', Auth::id())
                                ->where('livro_id', $livro->id)
                                ->first();

    if ($carrinhoExistente) {
        // Atualiza a quantidade se o livro já estiver no carrinho
        $carrinhoExistente->quantidade += $request->input('quantidade');
        $carrinhoExistente->save();
        return redirect()->back()->with('success', 'Quantidade atualizada no carrinho.');
    }

    // Cria um novo item no carrinho
    $carrinho = new Carrinho();
    $carrinho->user_id = Auth::id();
    $carrinho->livro_id = $livro->id;
    $carrinho->quantidade = $request->input('quantidade');
    $carrinho->save();

    return redirect()->back()->with('success', 'Livro adicionado ao carrinho com sucesso.');
}

    public function remover($id)
{
    $carrinhoItem = Carrinho::find($id);

    // Verifica se o item pertence ao usuário logado
    if ($carrinhoItem && $carrinhoItem->user_id == Auth::id()) {
        $carrinhoItem->delete();
        return redirect()->route('carrinho.index')->with('success', 'Livro removido do carrinho com sucesso.');
    }

    return redirect()->route('carrinho.listar')->with('error', 'Não foi possível remover o livro do carrinho.');


}

}
