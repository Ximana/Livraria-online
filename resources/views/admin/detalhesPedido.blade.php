@extends('admin.masterAdmin')

@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Detalhes do Pedido #{{ $pedido->id }}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h5>Dados do Pedido</h5>
                    <p><strong>ID do Pedido:</strong> {{ $pedido->id }}</p>
                    <p><strong>Data do Pedido:</strong> {{ $pedido->data_pedido }}</p>
                    <p><strong>Status:</strong> {{ $pedido->status }}</p>
                    <p><strong>Total:</strong> kz {{ number_format($pedido->total, 2, ',', '.') }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Dados do Usuário</h5>
                    <p><strong>Nome:</strong> {{ $pedido->user->name }}</p>
                    <p><strong>Email:</strong> {{ $pedido->user->email }}</p>
                    <p><strong>Telefone:</strong> {{ $pedido->user->telefone }}</p>
                    <p><strong>Endereço:</strong> {{ $pedido->user->morada }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>Dados do Pagamento</h5>
                    @if ($pagamento)
                        <p><strong>ID do Pagamento:</strong> {{ $pagamento->id }}</p>
                        <p><strong>Forma de Pagamento:</strong> {{ $pagamento->forma_pagamento }}</p>
                        <p><strong>Status do Pagamento:</strong> {{ $pagamento->status }}</p>
                        <p><strong>Comprovativo:</strong> <a href="{{ asset('storage/comprovativos/' . $pagamento->comprovativo) }}" target="_blank">Ver Comprovativo</a></p>
                    @else
                        <p>Não há informações de pagamento para este pedido.</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>Itens do Pedido</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Livro</th>
                                <th>Quantidade</th>
                                <th>Preço Unitário</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedido->itens as $item)
                                <tr>
                                    <td>{{ $item->livro->titulo }}</td>
                                    <td>{{ $item->quantidade }}</td>
                                    <td>R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                                    <td>R$ {{ number_format($item->quantidade * $item->preco_unitario, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5>Total a Pagar: kz {{ number_format($pedido->total, 2, ',', '.') }}</h5>
                </div>
            </div>

            @if($pedido->status != 'Concluido')
            <div class="row">
                <div class="col-md-6">
                    <h5>Alterar Status do Pedido</h5>
                    <form action="{{ route('pedidos.atualizarStatus', $pedido->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="status_pedido">Status do Pedido:</label>
                            <select name="status" id="status_pedido" class="form-control">
                                <option value="Pendente" {{ $pedido->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                                <option value="Em processamento" {{ $pedido->status == 'Em processamento' ? 'selected' : '' }}>Em Processamento</option>
                                <option value="Concluido" {{ $pedido->status == 'Concluido' ? 'selected' : '' }}>Concluído</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar Status do Pedido</button>
                    </form>
                </div>
                @if ($pagamento)
                    <div class="col-md-6">
                        <h5>Alterar Status do Pagamento</h5>
                        <form action="{{ route('pagamentos.atualizarStatus', $pagamento->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="status_pagamento">Status do CC:</label>
                                <select name="status" id="status_pagamento" class="form-control">
                                    <option value="Pendente" {{ $pagamento->status == 'Pendente' ? 'selected' : '' }}>Pendente</option>
                                    <option value="Confirmado" {{ $pagamento->status == 'Confirmado' ? 'selected' : '' }}>Confirmado</option>
                                    <option value="Recusado" {{ $pagamento->status == 'Recusado' ? 'selected' : '' }}>Recusado</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar Status do Pagamento</button>
                        </form>
                    </div>
                @endif
            </div>
            @endif

        </div>
    </main>
@endsection
