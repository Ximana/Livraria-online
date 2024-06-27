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
        $carrinhoItens = Carrinho::with('livro') // Carrega o relacionamento com o livro
                                ->where('user_id', Auth::id())
                                ->get();

        return view('livraria.carrinho', compact('carrinhoItens'));

        
    }

     public function adicionar(Request $request, $livroId) // Recebe o ID do livro como parâmetro
    {
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
            // Se o livro já estiver no carrinho, pode implementar uma lógica aqui se necessário
            return redirect()->back()->with('error', 'Este livro já está no seu carrinho.');
        }

        // Cria um novo item no carrinho
        $carrinho = new Carrinho();
        $carrinho->user_id = Auth::id();
        $carrinho->livro_id = $livro->id;
        $carrinho->quantidade = 1; // Pode ajustar a quantidade conforme necessário
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
