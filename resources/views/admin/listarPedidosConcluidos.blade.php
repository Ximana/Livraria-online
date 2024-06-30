@extends('admin.masterAdmin')

@section('content')
<div class="container">
    <h1>Pedidos Concluídos</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID do Pedido</th>
                <th>Nome do Usuário</th>
                <th>Status</th>
                <th>Data do Pedido</th>
                <th>Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->user->name }}</td>
                    <td>{{ $pedido->status }}</td>
                    <td>{{ $pedido->created_at }}</td>
                    <td>{{ $pedido->total }}</td>
                    <td>
                        <a href="{{ route('pedidos.detalhes', $pedido->id) }}" class="btn btn-info">Detalhes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pedidos->links() }} <!-- Paginação -->
</div>
@endsection
