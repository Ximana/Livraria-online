@extends('admin/masterAdmin')

@section('content')

	<main class="mt-5 pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h4>Cadastrar Livros</h4>
				</div>
			</div>

			<div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        @if ($livro->imagem)
                            <img src="{{ asset('storage/' . $livro->imagem) }}" class="img-fluid rounded livro-imagem" alt="Imagem do livro {{ $livro->titulo }}">
                        @else
                            <p class="text-center">Sem imagem disponível</p>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h2>{{ $livro->titulo }}</h2>

                        <div class="mb-3">
                            <p><i class="fas fa-book mr-2"></i><strong>Editora:</strong> {{ $livro->editora }}</p>
                            <p><i class="fas fa-barcode mr-2"></i><strong>ISBN:</strong> {{ $livro->isbn }}</p>
                            <p><i class="fas fa-language mr-2"></i><strong>Idioma:</strong> {{ $livro->idioma }}</p>
                            <p><i class="fas fa-file-alt mr-2"></i><strong>Resumo:</strong> {{ $livro->resumo }}</p>
                            <p><i class="far fa-calendar-alt mr-2"></i><strong>Data de Publicação:</strong> {{ $livro->data_publicacao }}</p>
                            <p><i class="fas fa-money-bill-wave mr-2"></i><strong>Preço:</strong> R$ {{ $livro->preco }}</p>
                            <p><i class="fas fa-box mr-2"></i><strong>Quantidade:</strong> {{ $livro->quantidade }}</p>
                        </div>

                        <h5><i class="fas fa-user mr-2"></i>Autores:</h5>
                        <ul>
                            @foreach ($livro->autores as $autor)
                                <li>{{ $autor->nome }} ({{ $autor->pivot->descricao }})</li>
                            @endforeach
                        </ul>

                        <h5><i class="fas fa-tags mr-2"></i>Categorias:</h5>
                        <ul>
                            @foreach ($livro->categorias as $categoria)
                                <li>{{ $categoria->categoria }}</li>
                            @endforeach
                        </ul>

                        <a href="{{ route('livros.indexAdmin') }}" class="btn btn-primary"><i class="fas fa-arrow-left mr-2"></i>Voltar à Lista</a>
                    </div>
                </div>
            </div>
        </div>


		</div>
	</main>

	@endsection