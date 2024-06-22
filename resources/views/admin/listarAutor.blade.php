@extends('admin/masterAdmin')

@section('content')

	<main class="mt-5 pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h4>Listar Autor</h4>
				</div>
			</div>
			<div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Profissão</th>
                        <th>Biografia</th>
                        <th>Criado em</th>
                        <th>Atualizado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autores as $autor)
                    <tr>
                        <td>{{ $autor->id }}</td>
                        <td>{{ $autor->nome }}</td>
                        <td>{{ $autor->profissao }}</td>
                        <td>{{ $autor->biografia }}</td>
                        <td>{{ $autor->created_at }}</td>
                        <td>{{ $autor->updated_at }}</td>
                        <td>
                            <a href="{{ route('autores.editar', ['id' => $autor->id]) }}" class="fa fa-edit btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('autores.remover', ['id' => $autor->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" a-trash btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este autor?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $autores->links() }} <!-- Links de paginação -->
		</div>
	</main>

	@endsection