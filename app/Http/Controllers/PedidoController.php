<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Pedido;
use App\Models\ItensPedido;
use App\Models\Pagamento;
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
        // Validação do arquivo de comprovativo
    $request->validate([
        'comprovativo' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // Exemplo: máximo de 2MB
    ]);
    
        $user_id = auth()->id();
        $carrinhoItens = Carrinho::with('livro')->where('user_id', $user_id)->get();

        if ($carrinhoItens->isEmpty()) {
            return redirect()->route('carrinho.index')->with('error', 'Seu carrinho está vazio.');
        }

        $pedido = Pedido::create([
            'user_id' => $user_id,
            'status' => 'pendente',
            'total' => 0,
            'data_pedido' => now(),
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

        $pedido->update(['total' => $totalPedido]);

        Carrinho::where('user_id', $user_id)->delete();

        $pagamento = new Pagamento();
        $pagamento->pedido_id = $pedido->id;
        $pagamento->user_id = $user_id;
        $pagamento->forma_pagamento = $request->input('forma_pagamento');


        if ($request->hasFile('comprovativo')) {
            $file = $request->file('comprovativo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/comprovativos', $filename); // Armazena o arquivo no diretório correto
            $pagamento->comprovativo = $filename;
    }

        $pagamento->status = 'pendente';
        $pagamento->save();

        return redirect()->route('pedidos.index')->with('success', 'Pedido e pagamento registrados com sucesso. Aguarde a confirmação.');
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

    public function pedidosPendentes()
    {
          $pedidos = Pedido::whereIn('status', ['Pendente', 'Em processamento'])
                     ->with('user') // Carrega o relacionamento com o usuário
                     ->orderBy('created_at', 'desc')
                     ->paginate(10); // Paginação com 10 itens por página

        return view('admin.listarPedidosPendentes', compact('pedidos'));
}

public function pedidosConcluidos()
{
    $pedidos = Pedido::where('status', 'Concluido')
                     ->with('user') // Carrega o relacionamento com o usuário
                     ->orderBy('created_at', 'desc')
                     ->paginate(10); // Paginação com 10 itens por página

    return view('admin.listarPedidosConcluidos', compact('pedidos'));
}



 public function detalhes($id)
    {
        // Busca os dados do pedido junto com o usuário relacionado
        $pedido = Pedido::with('user', 'itens.livro')->findOrFail($id);

        // Busca os dados do pagamento relacionado ao pedido
        $pagamento = Pagamento::where('pedido_id', $id)->first();

        return view('admin..detalhesPedido', compact('pedido', 'pagamento'));
    }

    public function atualizarStatusPedido(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->status = $request->status;
        $pedido->save();

        return redirect()->route('pedidos.detalhes', $id)->with('success', 'Status do pedido atualizado com sucesso.');
    }

    public function atualizarStatusPagamento(Request $request, $id)
    {
        $pagamento = Pagamento::findOrFail($id);
        $pagamento->status = $request->status;
        $pagamento->save();

        return redirect()->route('pedidos.detalhes', $pagamento->pedido_id)->with('success', 'Status do pagamento atualizado com sucesso.');
    }
}
