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

        <h3>Total: {{ $total }}</h3>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Efetuar Pedido
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Formas de Pagamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--Corpo do modal -->
                        <form action="{{ route('pedidos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="formaPagamento">Escolha a forma de pagamento:</label>
                                <select class="form-control" id="formaPagamento" name="forma_pagamento" required>
                                    <option value="">Selecione</option>
                                    <option value="transferencia">Transferência Bancária</option>
                                    <option value="multicaixa">Multicaixa Express</option>
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <label for="comprovativoPagamento">Comprovativo de Pagamento:</label>
                                <input type="file" class="form-control-file" id="comprovativoPagamento" name="comprovativo" accept=".pdf,.jpg,.jpeg,.png" required>
                            </div>
                            <div class="form-group mt-4">
                                <h5>Transferência Bancária</h5>
                                <ul>
                                    <li><span>BFA: </span>0006.0000.0000.0000.0000</li>
                                    <li><span>BAI: </span>0006.0000.0000.0000.0000</li>
                                    <li><span>MILLENIUM ATLANTICO: </span>0006.0000.0000.0000.0000</li>
                                </ul>
                                <h5>Multicaixa Express</h5>
                                <span>937 123 602</span>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Efetuar Pedido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
