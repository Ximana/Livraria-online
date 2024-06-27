<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\ItensPedido;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{

    public function index(){
        // Obtém todos os pedidos do usuário logado, com paginação de 10 por página, ordenados do mais recente para o mais antigo
        $pedidos = Pedido::where('user_id', Auth::id())
                         ->orderBy('created_at', 'desc')
                         ->paginate(10);

        return view('livraria.pedidos', compact('pedidos'));
        //return view('livraria.pedidos');
    }
    
    public function store(Request $request)
    {
        $user_id = auth()->id();
        $carrinhoItens = Carrinho::with('livro')->where('user_id', $user_id)->get();

        $pedido = Pedido::create([
            'user_id' => $user_id,
            'status' => 'pendente', // ou outro status inicial
            'total' => 0, // será atualizado abaixo
            'data_pedido' => now(), // data atual
        ]);

        $totalPedido = 0;

        foreach ($carrinhoItens as $item) {
            $totalItem = $item->livro->preco * $item->quantidade;
            ItensPedido::create([
                'pedido_id' => $pedido->id,
                'livro_id' => $item->livro->id,
                'quantidade' => $item->quantidade,
                'preco_unitario' => $item->livro->preco,
            ]);
            $totalPedido += $totalItem;
        }

        // Atualiza o total do pedido
        $pedido->update(['total' => $totalPedido]);

        // Limpa o carrinho após criar o pedido
        Carrinho::where('user_id', $user_id)->delete();


        //return redirect()->route('pedidos.show')->with('success', 'Pedido realizado com sucesso!');
        return redirect()->route('carrinho.index')->with('success', 'Pedido realizado com sucesso!');
    }

    public function show($id){

        // Verifica se o pedido pertence ao usuário logado
        $pedido = Pedido::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->with('itens.livro')
                        ->firstOrFail();

        return view('livraria.detalhePedido', compact('pedido'));

        //return view('livraria.pedidos');
    }

}
