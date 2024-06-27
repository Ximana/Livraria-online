@extends('livraria/master')

@section('content')

<div class="container">
        <h1>Meu Carrinho</h1>

        @if ($carrinhoItens->isEmpty())
            <p>Seu carrinho está vazio.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrinhoItens as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->livro->titulo }}</td>
                            <td>{{ $item->livro->preco }}</td>
                            <td>{{ $item->quantidade }}</td>
                            <td>{{ $item->quantidade * $item->livro->preco }}</td>
                            <td>
                                <form action="{{ route('carrinho.remover', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="fa fa-trash btn-danger btn-sm"></button>
                                </form>
                                <a class="far fa-eye btn-success btn-sm" href="{{ route('livro.livroDetalhe', $item->livro->id) }}"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <form action="{{ route('pedidos.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Efetuar Pedido</button>
        </form>
    </div>
@endsection