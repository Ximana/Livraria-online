@extends('admin/masterAdmin')

@section('content')

	<main class="mt-5 pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h4>Listar Livros</h4>
				</div>
			</div>
		
		<div class="row">

             <h1>Listar Livros</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Título</th>
                    <th>Editora</th>
                    <th>ISBN</th>
                    <th>Idioma</th>
                    <th>Resumo</th>
                    <th>Data de Publicação</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Autores</th>
                    <th>Categorias</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livros as $livro)
                <tr>
                    <td>
                        @if ($livro->imagem)
                            <img src="{{ asset('storage/' . $livro->imagem) }}" class="livro-imagem" style="max-width: 100px; height: auto;" alt="Imagem do livro {{ $livro->titulo }}">
                        @else
                            Sem imagem
                        @endif
                    </td>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->editora }}</td>
                    <td>{{ $livro->isbn }}</td>
                    <td>{{ $livro->idioma }}</td>
                    <td>{{ $livro->resumo }}</td>
                    <td>{{ $livro->data_publicacao }}</td>
                    <td>R$ {{ $livro->preco }}</td>
                    <td>{{ $livro->quantidade }}</td>
                    <td>
                        @foreach ($livro->autores as $autor)
                            {{ $autor->nome }} ({{ $autor->pivot->descricao }}),
                        @endforeach
                    </td>
                    <td>
                        @foreach ($livro->categorias as $categoria)
                            {{ $categoria->categoria }},
                        @endforeach
                    </td>
                    <td><a href="{{ route('livros.show', $livro->id) }}" class="btn btn-info btn-sm fa fa-eye"></a>
                        <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-warning btn-sm fa fa-registered"></a>
                        <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fa fa-trash btn btn-danger btn-sm"></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $livros->links() }}
		</div>

		</div>
	</main>

	@endsection