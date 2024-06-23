@extends('admin/masterAdmin')

@section('content')

	<main class="mt-5 pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h4>Cadastrar Livros</h4>
				</div>
			</div>

			

        <form action="{{ route('livros.update', $livro->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $livro->titulo }}" required>
                    </div>

                    <div class="form-group">
                        <label for="editora">Editora</label>
                        <input type="text" class="form-control" id="editora" name="editora" value="{{ $livro->editora }}">
                    </div>

                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $livro->isbn }}">
                    </div>

                    <div class="form-group">
                        <label for="idioma">Idioma</label>
                        <input type="text" class="form-control" id="idioma" name="idioma" value="{{ $livro->idioma }}" required>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="data_publicacao">Data de Publicação</label>
                        <input type="date" class="form-control" id="data_publicacao" name="data_publicacao" value="{{ $livro->data_publicacao }}">
                    </div>

                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <input type="number" class="form-control" id="preco" name="preco" value="{{ $livro->preco }}" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ $livro->quantidade }}" required>
                    </div>

                    <div class="form-group">
                        <label for="imagem">Imagem</label>
                        <input type="text" class="form-control" id="imagem" name="imagem" value="{{ $livro->imagem }}">
                    </div>
                </div>
                <div class="form-group ">
                        <label for="resumo">Resumo</label>
                        <textarea class="form-control" id="resumo" name="resumo" rows="3" required>{{ $livro->resumo }}</textarea>
                </div>
            </div>

            <button type="submit" class="mt-3 btn btn-primary">Salvar</button>
        </form>



		</div>
	</main>

	@endsection