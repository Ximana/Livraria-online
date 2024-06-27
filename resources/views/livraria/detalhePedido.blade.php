@extends('livraria/master')

@section('content')

<div class="container">
    <h1 class="my-4">Detalhes do Pedido #{{ $pedido->id }}</h1>
    <div class="row">
        <div class="col-md-6">
            <h4>Informações do Pedido</h4>
            <p><strong>Total:</strong> {{ $pedido->total }}</p>
            <p><strong>Status:</strong> {{ $pedido->status }}</p>
            <p><strong>Data do Pedido:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>
    <h4 class="my-4">Itens do Pedido</h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Livro</th>
                    <th>Autor(es)</th>
                    <th>Categoria(s)</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido->itens as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->livro->titulo }}</td>
                    <td>
                        @foreach ($item->livro->autores as $autor)
                            {{ $autor->nome }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($item->livro->categorias as $categoria)
                            {{ $categoria->categoria }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>{{ $item->quantidade }}</td>
                    <td>{{ $item->livro->preco }}</td>
                    <td>{{ $item->quantidade * $item->livro->preco }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection