<!-- resources/views/dashboard.blade.php -->

@extends('admin.masterAdmin')

@section('content')
<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Listar Pedidos Pendentes</h4>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Usuário</th>
                            <th>Data do Pedido</th>
                            <th>Status</th>
                            <th>Detalhes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->user->name }}</td>
                                <td>{{ $pedido->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>{{ $pedido->status }}</td>
                                <td>
                                    <a href="{{ route('pedidos.detalhes', $pedido->id) }}" class="btn btn-sm btn-info">Detalhes</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Não há pedidos pendentes.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $pedidos->links() }} <!-- Links de paginação -->
            </div>
        </div>
    </div>
</main>
@endsection
