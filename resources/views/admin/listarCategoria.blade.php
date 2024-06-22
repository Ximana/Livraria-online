@extends('admin/masterAdmin')

@section('content')

	<main class="mt-5 pt-3">
		<div class="container-fluid">
			<h1>Listar Categoria</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Descrição</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->categoria }}</td>
                            <td>{{ $categoria->descricao }}</td>
                            <td>{{ $categoria->created_at }}</td>
                            <td>{{ $categoria->updated_at }}</td>
                            <td>
                                <a href="{{ route('categorias.edit', $categoria->id) }}" class="fa fa-edit btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" fa fa-trash btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja remover esta categoria?')">Remover</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $categorias->links('pagination::bootstrap-4') }}
			


		</div>
		</div>
	</main>

	@endsection