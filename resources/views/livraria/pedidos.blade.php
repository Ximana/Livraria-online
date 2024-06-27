@extends('livraria/master')

@section('content')

<div class="container">
    <h1 class="my-4">Meus Pedidos</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->total }}</td>
                    <td>{{ $pedido->status }}</td>
                    <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('pedidos.show', $pedido->id) }}" class="fa fa-eye btn btn-success btn-sm"></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Nenhum pedido encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $pedidos->links('pagination::bootstrap-4') }}
    </div>
</div>

@endsection